<?php
/**
  * La classe EMealPlan contiene tutti gli attributi e metodi riguardanti il piano alimentare. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idMealPlan: è l'identificativo del piano alimentare stesso;
  * - nameMealPlan: è il nome del piano alimentare;
  * - description: è la descrizione del piano alimentare;
  * - tag: è il tag del piano alimentare;
  * - creation_date: è la data di creazione del piano alimentare;
  * - creator: è il profilo che ha creato il piano alimentare;
  * - recipes: nel piano alimentare c'è la lista delle ricette;
*/

require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "mealplan")]

class EMealPlan{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idMealPlan = null;
   
    #[ORM\Column(type: "string")]
    private string $nameMealPlan;
    
    #[ORM\Column(type: "text")]
    private string $description;
    
    #[ORM\Column(type: "string")]
    private string $tag;
    
    #[ORM\ManyToOne(targetEntity: EProfile::class)]
    #[ORM\JoinColumn(name: "creator_id", referencedColumnName: "idUser", nullable: false)]
    private EProfile $creator;
   
    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;
    
    #[ORM\ManyToMany(targetEntity: ERecipe::class)]
    #[ORM\JoinTable(name: "mealplan_recipes", joinColumns: [new ORM\JoinColumn(name: "mealplan_id", referencedColumnName: "idMealPlan")], inverseJoinColumns: [new ORM\JoinColumn(name: "recipe_id", referencedColumnName: "idRecipe")])]
    private Collection $recipes;

    #[ORM\OneToMany(mappedBy: "mealPlan", targetEntity: EMeal::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $meals;

    private static $entity = EMealPlan::class;

     /**CONSTRUCTOR */
    public function __construct($nameMealPlan, $description, $tag, EProfile $creator){
        $this->nameMealPlan = $nameMealPlan;
        $this->description = $description;
        $this->tag = $tag;
        $this->creator = $creator;
        $this->creation_time = new DateTime("now");
        $this->recipes = new ArrayCollection();  
        $this->meals = new ArrayCollection();
    }


    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getIdMealPlan(): ?int { return $this->idMealPlan; }

    public function getNameMealPlan(): string { return $this->nameMealPlan; }

    public function getDescription(): string { return $this->description; }

    public function getTag(): string { return $this->tag; }

    public function getCreator(): EProfile { return $this->creator; }

    public function getCreationTime(): DateTime { return $this->creation_time; }

    public function getTimeStr(): string { return $this->creation_time->format('Y-m-d H:i:s'); }

    public function getRecipes(): Collection { return $this->recipes; }

    public function getMeals(): Collection { return $this->meals; }


    /**SETTERS */
    //Doctrine gestisce automaticamente l’id, il metodo setIdMealPlan() non serve e può causare problemi
    public function setNameMealPlan(string $nameMealPlan): void { $this->nameMealPlan = $nameMealPlan; }

    public function setDescription(string $description): void { $this->description = $description; }

    public function setTag(string $tag): void { $this->tag = $tag; }

    public function setCreator(EProfile $creator): void { $this->creator = $creator; }

    public function setCreationTime(DateTime $dateTime): void { $this->creation_time = $dateTime; }

    //Add a recipe, checking if it's not already present
    public function addRecipe(ERecipe $recipe): void {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
        }
    }

    //Remove a recipe
    public function removeRecipe(ERecipe $recipe): void {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
        }
    }

    //Add a meal, checking if it's not already present
    public function addMeal(EMeal $meal): void {
        if (!$this->meals->contains($meal)) {
            $this->meals->add($meal);
            $meal->setMealPlan($this);
        }
    }

    //Remove a meal
    public function removeMeal(EMeal $meal): void {
        if ($this->meals->contains($meal)) {
            $this->meals->removeElement($meal);
            $meal->setMealPlan(null);
        }
    }
}
