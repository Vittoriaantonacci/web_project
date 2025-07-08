<?php
/**
 * The EMealPlan class defines all attributes and methods related to a meal plan.
 * It includes the following attributes (with corresponding methods):
 * - idMealPlan: a unique identifier for the meal plan;
 * - nameMealPlan: the name of the meal plan;
 * - description: the description of the meal plan;
 * - tag: the tag associated with the meal plan;
 * - creation_time: the date and time when the meal plan was created;
 * - creator: an EProfile object representing the creator of the meal plan;
 * - meals: a collection of EMeal objects that compose the meal plan.
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

    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;
    
    #[ORM\ManyToOne(targetEntity: EProfile::class)]
    #[ORM\JoinColumn(name: "creator_id", referencedColumnName: "idUser")]
    private EProfile $creator;
   
    #[ORM\ManyToMany(targetEntity: EMeal::class, inversedBy: "mealPlans", cascade: ["persist"])]
    #[ORM\JoinTable(name: "mealplan_meals",
        joinColumns: [new ORM\JoinColumn(name: "idMealPlan", referencedColumnName: "idMealPlan")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "idMeal", referencedColumnName: "idMeal")]
    )]
    private Collection $meals;

    private static $entity = EMealPlan::class;

     /**CONSTRUCTOR */
    public function __construct($nameMealPlan, $description, $tag, EProfile $creator){
        $this->nameMealPlan = $nameMealPlan;
        $this->description = $description;
        $this->tag = $tag;
        $this->creator = $creator;
        $this->creation_time = new DateTime("now");
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

    public function getMeals(): Collection { return $this->meals; }


    /**SETTERS */
    //Doctrine automatically manages the ID; the setIdMealPlan() method is unnecessary and can cause problems
    public function setNameMealPlan(string $nameMealPlan): void { $this->nameMealPlan = $nameMealPlan; }

    public function setDescription(string $description): void { $this->description = $description; }

    public function setTag(string $tag): void { $this->tag = $tag; }

    public function setCreator(EProfile $creator): void { $this->creator = $creator; }

    public function setCreationTime(DateTime $dateTime): void { $this->creation_time = $dateTime; }

    public function addMeal(EMeal $meal): void {
        if (!$this->meals->contains($meal)) {
            $this->meals->add($meal);
            $meal->addMealPlan($this);
        }
    }

    public function removeMeal(EMeal $meal): void {
        if ($this->meals->contains($meal)) {
            $this->meals->removeElement($meal);
            $meal->removeMealPlan($this);
        }
    }
}
