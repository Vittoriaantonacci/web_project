<?php
/**
 * The ERecipe class defines all attributes and methods related to a recipe.
 * It includes the following attributes (with corresponding methods):
 * - idRecipe: a unique identifier for the recipe;
 * - createdAt: the date and time the recipe was created;
 * - nameRecipe: the name of the recipe;
 * - infos: general information about the recipe;
 * - description: the description of the recipe;
 * - category: the category associated with the recipe;
 * - preparation_time: time required for preparation;
 * - cooking_time: time required for cooking;
 * - grams_one_portion: weight in grams for a single portion;
 * - image: representative image of the recipe (of type EImage);
 * - creator: the EProfile object of the user who created the recipe;
 * - ingredients: a set of ingredients (EMeal) that compose the recipe;
 */

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "recipe")]

class ERecipe {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idRecipe = null; 

    #[ORM\Column(type: "datetime")]
    private DateTime $createdAt;
   
    #[ORM\Column(type: "string")]
    private string $nameRecipe;
    
    #[ORM\Column(type: "text")]
    private string $infos;
    
    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "string")]
    private string $category;

    #[ORM\Column(type: "integer")]
    private int $preparation_time;
    
    #[ORM\Column(type: "integer")]
    private int $cooking_time;
    
    #[ORM\Column(type: "integer")]
    private int $grams_one_portion;

    #[ORM\OneToOne(targetEntity: EImage::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "image_id", referencedColumnName: "idImage")]
    private ?EImage $image = null;

    #[ORM\ManyToOne(targetEntity: EProfile::class)]
    #[ORM\JoinColumn(name: "creator_id", referencedColumnName: "idUser")]
    private EProfile $creator;

    #[ORM\ManyToMany(targetEntity: EMeal::class, inversedBy: "recipes", cascade: ["persist"])]
    #[ORM\JoinTable(name: "recipe_meal",
        joinColumns: [new ORM\JoinColumn(name: "recipe_id", referencedColumnName: "idRecipe")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "meal_id", referencedColumnName: "idMeal")]
    )]
    private Collection $ingredients;

    private static string $entity = ERecipe::class;

    /**CONSTRUCTOR */
    public function __construct($nameRecipe, $infos, $description, $preparation_time, $cooking_time, $grams_one_portion, $category) {
        $this->nameRecipe = $nameRecipe;
        $this->infos = $infos;
        $this->category = $category;
        $this->description = $description;
        $this->preparation_time = $preparation_time;
        $this->cooking_time = $cooking_time;
        $this->grams_one_portion = $grams_one_portion;
        $this->ingredients = new ArrayCollection();
        $this->createdAt = new DateTime();
    }

    
    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdRecipe(): ?int { return $this->idRecipe; }

    public function getCreationTime(): DateTime { return $this->createdAt; }

    public function getNameRecipe(): string { return $this->nameRecipe; }

    public function getInfos(): string { return $this->infos; }

    public function getDescription(): string { return $this->description; }

    public function getIngredients(): Collection { return $this->ingredients; }

    public function getPreparationTime(): int { return $this->preparation_time; }

    public function getCookingTime(): int { return $this->cooking_time; }

    public function getGramsOnePortion(): int { return $this->grams_one_portion; }

    public function getImage(): ?EImage { return $this->image; }

    public function getCreator(): EProfile { return $this->creator; }

    public function getCategory(): string { return $this->category; }

    
    /**SETTERS */    
    public function setNameRecipe(string $nameRecipe): void { $this->nameRecipe = $nameRecipe; }

    public function setInfos(string $infos): void { $this->infos = $infos; }

    public function setDescription(string $description): void { $this->description = $description; }

    public function setPreparationTime(int $preparation_time): void { $this->preparation_time = $preparation_time; }

    public function setCookingTime(int $cooking_time): void { $this->cooking_time = $cooking_time; }

    public function setGramsOnePortion(int $grams): void { $this->grams_one_portion = $grams; }

    public function setCreator(EProfile $profile): void { $this->creator = $profile; }

    public function setCategory(string $category): void { $this->category = $category; }

    public function addImage(EImage $image): void {
            $this->image = $image;
            $image->setRecipe($this);
    }

    public function removeImage(): void {
        if ($this->image !== null) {
            $this->image->setRecipe(null);
            $this->image = null;
        }
    }
    
    public function addIngredient(EMeal $ingredient): void {
        if (!$this->ingredients->contains($ingredient)){
            $this->ingredients->add($ingredient);
            $ingredient->addRecipe($this); 
        }
    }
    public function removeIngredient(EMeal $ingredient): void {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
            $ingredient->removeRecipe($this);
        }
    }
}
