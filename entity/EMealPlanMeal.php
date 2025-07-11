<?php
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity] 
#[ORM\Table(name:"mealplan_meal")]
class EMealPlanMeal {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private $id;

    #[ORM\Column(type:"integer")]
    private $idMealPlan;

    #[ORM\Column(type:"integer")]
    private $idMeal;

    #[ORM\Column(type:"string")]
    private string $mealType;

    private static $entity = EMealPlanMeal::class;


    public function __construct($idMealPlan, $idMeal, $mealType) {
        $this->idMealPlan = $idMealPlan;
        $this->idMeal = $idMeal;
        $this->mealType = $mealType;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdMealPlan() { return $this->idMealPlan; }

    public function getIdMeal() { return $this->idMeal; }

    public function getId() { return $this->id; }

    public function getMealType(): string { return $this->mealType; }

}