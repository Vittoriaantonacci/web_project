<?php
/**
 * The EMeal class defines all attributes and methods related to a meal.
 * It includes the following attributes (with corresponding methods):
 * - idMeal: a unique identifier for the meal;
 * - nameMeal: the name of the meal;
 * - type: the type of meal;
 * - image: the image associated with the meal;
 * - serving: an EServing entity containing nutritional information for a single serving;
 * - recipes: a collection of ERecipe objects that make up the meal.
 */


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "meal")]

class EMeal{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idMeal = null; 
    
    #[ORM\Column(type: "string")]
    private string $nameMeal;

    #[ORM\Column(type: "string")]
    private string $type;
   
    #[ORM\OneToOne(inversedBy: "meal", targetEntity: EImage::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "image_id", referencedColumnName: "idImage")]
    private ?EImage $image = null;

    #[ORM\OneToOne(mappedBy: "meal", targetEntity: EServing::class, cascade: ["persist", "remove"])]
    private ?EServing $serving = null;
    
    #[ORM\ManyToMany(targetEntity: ERecipe::class, mappedBy: "ingredients")]
    private Collection $recipes;

    private static $entity = EMeal::class;

    /**CONSTRUCTOR */
    public function __construct($nameMeal, $type){
        $this->nameMeal = $nameMeal;
        $this->type = $type;
        $this->recipes = new ArrayCollection(); 
    }


    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getId(): ?int { return $this->idMeal; }

    public function getName(): string { return $this->nameMeal; }

    public function getImage(): EImage { return $this->image; }

    public function getType(): string { return $this->type; }

    public function getRecipes() { return $this->recipes; }

    public function getServing(): ?EServing { return $this->serving; }


    /**SETTERS */
    public function setName(string $nameMeal): void { $this->nameMeal = $nameMeal; }

    public function setImage(EImage $imageMeal): void { $this->image = $imageMeal; }

    public function setType(string $type): void { $this->type = $type; }

    public function setServing(EServing $serving): void {
        $this->serving = $serving;
        $serving->setMeal($this);
    }

    public function addRecipe(ERecipe $recipe): void {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->addIngredient($this);
        }
    }

    public function removeRecipe(ERecipe $recipe): void {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
            $recipe->removeIngredient($this);
        }
    }


    public function toString(): string {
        $output = "Nome: " . $this->nameMeal . "\n";
        $output .= "Tipo: " . $this->type . "\n";
        $output .= "Servings:\n";
        if ($this->serving) {
            $output .= "- " . $this->serving->toString() . "\n";
        }
        return $output;
    }

    public static function fromFatSecretJson($data) {
        $meals = [];

        foreach ($data['foods']['food'] as $food) {
            $name = $food['food_name'];
            //$brand = $food['brand_name'];
            $type = $food['food_type'] ?? 'Unknown';
            $description = $food['food_description'];
            // Split description: "Per 100g - Calories: 89kcal | Fat: 0.33g | Carbs: 22.84g | Protein: 1.09g"
            $parts = explode('-', $description, 2);
            $info = trim($parts[0]);
            $nutrientsPart = $parts[1] ?? '';
            $nutrients = array_map('trim', explode('|', $nutrientsPart));
            foreach ($nutrients as $n) {
                if (str_contains($n, 'Calories')) {
                    preg_match('/([\d.]+)/', $n, $matches);
                    $cal = (float)($matches[1] ?? 0);
                } elseif (str_contains($n, 'Fat')) {
                    preg_match('/([\d.]+)/', $n, $matches);
                    $fat = (float)($matches[1] ?? 0);
                } elseif (str_contains($n, 'Carbs')) {
                    preg_match('/([\d.]+)/', $n, $matches);
                    $carb = (float)($matches[1] ?? 0);
                } elseif (str_contains($n, 'Protein')) {
                    preg_match('/([\d.]+)/', $n, $matches);
                    $protein = (float)($matches[1] ?? 0);
                }
            }
            $serving = new EServing(
                $info,
                $cal,
                $carb,
                $protein,
                $fat
            );
            $meal = new EMeal(
                $name,
                $type
            );
            $meal->setServing($serving);
            $meals[] = $meal; 
        }

        return $meals;
    }
}
