<?php
/**
 * The EServing class represents a serving associated with a meal, containing all attributes and methods related to a serving.
 * It includes the following attributes:
 * - idServing: a unique identifier for the serving;
 * - description: description of the serving;
 * - calories: calorie content of the serving;
 * - carbohydrate: amount of carbohydrates (g);
 * - protein: amount of proteins (g);
 * - fat: amount of fats (g);
 * - meal: reference to the meal (EMeal) associated with the serving;
 */


require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "serving")]

class EServing {
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idServing = null; 
    
    #[ORM\Column(type: "text")]
    private string $description;
    
    #[ORM\Column(type: "float")]
    private float $calories;

    #[ORM\Column(type: "float")]
    private float $carbohydrate;
    
    #[ORM\Column(type: "float")]
    private float $protein;
    
    #[ORM\Column(type: "float")]
    private float $fat;
    
    #[ORM\OneToOne(inversedBy: "serving", targetEntity: EMeal::class)]
    #[ORM\JoinColumn(name: "meal_id", referencedColumnName: "idMeal")]
    private ?EMeal $meal = null;

    private static string $entity = EServing::class;

    //** CONSTRUCTOR */
    public function __construct(string $description, float $calories, float $carbohydrate, float $protein, float $fat) {
        $this->description = $description;
        $this->calories = $calories;
        $this->carbohydrate = $carbohydrate;
        $this->protein = $protein;
        $this->fat = $fat;
    }

    
    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdServing(): ?int { return $this->idServing; }

    public function getDescription(): string { return $this->description; }

    public function getCalories(): float { return $this->calories; }

    public function getCarbohydrate(): float { return $this->carbohydrate; }

    public function getProtein(): float { return $this->protein; }

    public function getFat(): float { return $this->fat; }

    public function getMeal(): ?EMeal {
        return $this->meal;
    }


    /**SETTERS */
    public function setDescription(string $description): void { $this->description = $description; }

    public function setCalories(float $calories): void { $this->calories = $calories; }

    public function setCarbohydrate(float $carbohydrate): void { $this->carbohydrate = $carbohydrate; }

    public function setProtein(float $protein): void { $this->protein = $protein; }

    public function setFat(float $fat): void { $this->fat = $fat; }

    public function setMeal(?EMeal $meal): void { $this->meal = $meal; }

    public function toString(): string {
        return sprintf(
            "%s | Calorie: %.2f | Carboidrati: %.2fg | Proteine: %.2fg | Grassi: %.2fg",
            $this->description,
            $this->calories,
            $this->carbohydrate,
            $this->protein,
            $this->fat
        );
    }
}