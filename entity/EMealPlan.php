<?php
/**
 * The EMealPlan class defines all attributes and methods related to a meal plan.
 * It includes the following attributes (with corresponding methods):
 * - idMealPlan: a unique identifier for the meal plan;
 * - nameMealPlan: the name of the meal plan;
 * - description: the description of the meal plan;
 * - category: the category of the meal plan;
 * - creation_time: the date and time when the meal plan was created;
 * - creator: an EProfile object representing the creator of the meal plan.
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
    private string $category;

    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;
    
    #[ORM\ManyToOne(targetEntity: EProfile::class)]
    #[ORM\JoinColumn(name: "creator_id", referencedColumnName: "idUser")]
    private EProfile $creator;

    private static $entity = EMealPlan::class;

     /**CONSTRUCTOR */
    public function __construct($nameMealPlan, $description, $category){
        $this->nameMealPlan = $nameMealPlan;
        $this->description = $description;
        $this->category = $category;
        $this->creation_time = new DateTime("now");
    }


    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getIdMealPlan(): ?int { return $this->idMealPlan; }

    public function getNameMealPlan(): string { return $this->nameMealPlan; }

    public function getDescription(): string { return $this->description; }

    public function getCategory(): string { return $this->category; }

    public function getCreator(): EProfile { return $this->creator; }

    public function getCreationTime(): DateTime { return $this->creation_time; }

    public function getCreationTimeStr(): string { return $this->creation_time->format('Y-m-d H:i:s'); }


    /**SETTERS */
    public function setNameMealPlan(string $nameMealPlan): void { $this->nameMealPlan = $nameMealPlan; }

    public function setDescription(string $description): void { $this->description = $description; }

    public function setCategory(string $category): void { $this->category = $category; }

    public function setCreator(EProfile $creator): void { $this->creator = $creator; }

    public function setCreationTime(DateTime $dateTime): void { $this->creation_time = $dateTime; }

}
