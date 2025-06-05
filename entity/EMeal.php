<?php
/**
  * La classe EMeal contiene tutti gli attributi e metodi riguardanti il piatto stesso. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idMeal: è l'identificativo del piatto stesso;
  * - nameMeal: è il nome del piatto;
  * - imageMeal: è l'immagine del piatto;
  * - type: è il tipo di patto;
  * - recipe: è la ricetta del piatto;
  * - servings: nel piatto c'è la lista delle porzioni;
*/

require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "meal")]

class EMeal{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idMeal = null; //l’id può essere null finché Doctrine non lo assegna
    
    #[ORM\Column(type: "string")]
    private string $nameMeal;
   
    #[ORM\OneToOne(targetEntity: EImage::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "image_id", referencedColumnName: "idImage", nullable: false)]
    private EImage $imageMeal;
   
    #[ORM\Column(type: "string")]
    private string $type;
    
    #[ORM\ManyToOne(targetEntity: ERecipe::class, inversedBy: "ingredients")]
    #[ORM\JoinColumn(name: "recipe_id", referencedColumnName: "idRecipe", nullable: false)]
    private ?ERecipe $recipe = null; //il tipo dovrebbe essere nullable per poter inizializzare l’oggetto senza assegnargli subito una ricetta
  
    #[ORM\OneToMany(mappedBy: "meal", targetEntity: EServing::class, cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $servings;

    private static $entity = EMeal::class;

    /**CONSTRUCTOR */
    public function __construct($nameMeal, $type){
        $this->nameMeal = $nameMeal;
        $this->type = $type;
        $this->servings = new ArrayCollection();  
    }


    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getIdMeal(): ?int { return $this->idMeal; }

    public function getNameMeal(): string { return $this->nameMeal; }

    public function getImageMeal(): EImage { return $this->imageMeal; }

    public function getType(): string { return $this->type; }

    public function getRecipe(): ?ERecipe { return $this->recipe; }

    public function getServings(): Collection { return $this->servings; }


    /**SETTERS */
    //Doctrine gestisce automaticamente l’id, il metodo setIdMeal() non serve e può causare problemi
    
    public function setNameMeal(string $nameMeal): void { $this->nameMeal = $nameMeal; }

    public function setImageMeal(EImage $imageMeal): void { $this->imageMeal = $imageMeal; }

    public function setType(string $type): void { $this->type = $type; }

    public function setRecipe(ERecipe $recipe): void { $this->recipe = $recipe; }

    //metodo per aggiungere una porzione
    public function addServing(EServing $serving): void {
        if (!$this->servings->contains($serving)){
            $this->servings->add($serving);
            $serving->setMeal($this);
        }
    }  

    //metodo per rimuovere una porzione
    public function removeServing(EServing $serving): void {
        if ($this->servings->contains($serving)) {
            $this->servings->removeElement($serving);
            $serving->setMeal(null); //scollega la porzione dal pasto
        }
    }
}