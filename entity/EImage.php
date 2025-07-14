<?php
/**
 * The EImage class defines all attributes and methods related to images.
 * It includes the following attributes (with corresponding methods):
 * - idImage: a unique identifier for the image;
 * - name: the name of the image;
 * - size: the dimensions of the image;
 * - type: the type of the image;
 * - imagePath: the file path in the filesystem or a relative URL;
 * - post: an EPost object to which the image may be associated;
 * - meal: an EMeal object associated with the image;
 * - recipe: an ERecipe object associated with the image;
 * - profile: an EProfile object associated with the image.
 */


use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity] 
#[ORM\Table(name: "image")]
class EImage{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $idImage; 
   
    #[ORM\Column(type: "string")]
    private string $name;
    
    #[ORM\Column(type: "integer")]
    private int $size;
    
    #[ORM\Column(type: "string")]
    private string $type;

    #[ORM\Column(type: "string")]
    private string $imagePath;

    #[ORM\ManyToOne(targetEntity: EPost::class, inversedBy: "images", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost", nullable: true)]
    private ?EPost $post = null;

    #[ORM\OneToOne(targetEntity: EMeal::class, inversedBy: "image", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idMeal", referencedColumnName: "idMeal", nullable: true)]
    private ?EMeal $meal = null;

    #[ORM\OneToOne(targetEntity: ERecipe::class, inversedBy: "image", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idRecipe", referencedColumnName: "idRecipe", nullable: true)]
    private ?ERecipe $recipe = null;

    #[ORM\OneToOne(targetEntity: EProfile::class, inversedBy: "image", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser", nullable: true)]
    private ?EProfile $profile = null;

    private static $entity = EImage::class;

    /** CONSTRUCTOR */
    public function __construct($name, $size, $type, $imagePath){
        $this->name = $name;
        $this->size = $size;
        $this->type = $type;
        $this->imagePath = $imagePath;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdImage(): int { return $this->idImage; }

    public function getName(): string { return $this->name; }

    public function getSize(): int { return $this->size; }

    public function getType(): string { return $this->type; }

    public function getImagePath(): string { return $this->imagePath; }

    public function getPost(): ?EPost { return $this->post; }

    public function getMeal(): ?EMeal { return $this->meal; }

    public function getRecipe(): ?ERecipe { return $this->recipe; }

    public function getProfile(): ?EProfile { return $this->profile; }


    /** SETTERS */  
    public function setName(string $name): void { $this->name = $name; }

    public function setSize(int $size): void { $this->size = $size; }

    public function setType(string $type): void { $this->type = $type; }

    public function setImagePath(string $path): void { $this->imagePath = $path; }

    public function setPost(?EPost $post): void { $this->post = $post; }

    public function setMeal(?EMeal $meal): void { $this->meal = $meal; }

    public function setRecipe(?ERecipe $recipe): void { $this->recipe = $recipe; }

    public function setProfile(?EProfile $profile): void { $this->profile = $profile; }
}