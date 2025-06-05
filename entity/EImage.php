<?php
/**
  * La classe EImage contiene tutti gli attributi e metodi riguardanti le immagini. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idImage: è un identificativo dell'immagine stessa;
  * - name: nome dell'immagine;
  * - size: le dimensioni dell'immagine;
  * - type: tipo dell'immagine;
  * - imageData: dati binari dell'immagine;
  * - post: post di cui l'immagine fa parte;
*/

require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity] 
#[ORM\Table(name: "image")]

class EImage{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idImage = null; //l’id può essere null finché Doctrine non lo assegna
   
    #[ORM\Column(type: "string")]
    private string $name;
    
    #[ORM\Column(type: "integer")]
    private int $size;
    
    #[ORM\Column(type: "string")]
    private string $type;
    
    #[ORM\Column(type: "blob")]
    private string $imageData;

    #[ORM\ManyToOne(targetEntity: EPost::class, inversedBy: "images")]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost", nullable: false)]
    private EPost $post;

    private static $entity = EImage::class;

    /** CONSTRUCTOR */
    public function __construct($name, $size, $type, $imageData, EPost $post){
        $this->name = $name;
        $this->size = $size;
        $this->type = $type;
        $this->imageData = $imageData;
        $this->post = $post;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdImage(): ?int { return $this->idImage; }

    public function getName(): string { return $this->name; }

    public function getSize(): int { return $this->size; }

    public function getType(): string { return $this->type; }

    public function getImageData() { return $this->imageData; }

    public function getEncodedData(): string { return base64_encode($this->imageData); }

    public function getPost(): EPost { return $this->post; }


    /** SETTERS */  
    //Doctrine gestisce automaticamente l’id, il metodo setIdImage() non serve e può causare problemi

    public function setName(string $name): void { $this->name = $name; }

    public function setSize(int $size): void { $this->size = $size; }

    public function setType(string $type): void { $this->type = $type; }

    public function setImageData(string $data): void { $this->imageData = $data; }

    public function setPost(EPost $post): void { $this->post = $post; }
}