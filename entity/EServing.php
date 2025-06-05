<?php
/**
 * La classe EServing rappresenta una porzione di un piatto, contiene tutti gli attributi e metodi riguardanti una porzione. 
 * Contiene i seguenti attributi:
 * - idServing: identificativo della porzione;
 * - description: descrizione della porzione;
 * - calories: calorie della porzione;
 * - carbohydrate: quantità di carboidrati (g);
 * - protein: quantità di proteine (g);
 * - fat: quantità di grassi (g);
 * - meal: pasto al quale si riferisce la divisione delle porzioni
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
    private ?int $idServing = null; //l’id può essere null finché Doctrine non lo assegna
    
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
    
    #[ORM\ManyToOne(targetEntity: EMeal::class, inversedBy: "servings")]
    #[ORM\JoinColumn(name: "meal_id", referencedColumnName: "idMeal", nullable: false)]
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

    public function getMeal(): ?EMeal { return $this->meal; }   


    /**SETTERS */
    //Doctrine gestisce automaticamente l’id, il metodo setIdServing() non serve e può causare problemi

    public function setDescription(string $description): void { $this->description = $description; }

    public function setCalories(float $calories): void { $this->calories = $calories; }

    public function setCarbohydrate(float $carbohydrate): void { $this->carbohydrate = $carbohydrate; }

    public function setProtein(float $protein): void { $this->protein = $protein; }

    public function setFat(float $fat): void { $this->fat = $fat; }

    public function setMeal(?EMeal $meal): void { $this->meal = $meal; }
}
