<?php
/**
  * La classe EPost contiene tutti gli attributi e metodi riguardanti i post. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idPost: è un identificativo del post stesso;
  * - title: titolo del post;
  * - description: descrizione del post;
  * - category: categoria del post;
  * - creation_time: data e ora del post;
  * - isRemoved: post rimosso o no;
  * - profile: oggetto EProfile relativo al profilo di colui che ha pubblicato il post;
  * - images: insieme di immagini del post;
  * - comments: insieme dei commenti del post;
  * - likes: insieme dei like del post;
*/

require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "post")]

class EPost{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idPost = null; //l’id può essere null finché Doctrine non lo assegna
   
    #[ORM\Column(type: "string")]
    private string $title;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "string")]
    private string $category;

    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;

    #[ORM\Column(type: "boolean")]
    private bool $isRemoved;

    #[ORM\ManyToOne(targetEntity: EProfile::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser")]
    private EProfile $profile;

    #[ORM\OneToMany(mappedBy: "post", targetEntity: EImage::class, cascade: ["persist", "remove"])]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: "post", targetEntity: EComment::class, cascade: ["persist", "remove"])]
    private Collection $comments;
   
    #[ORM\OneToMany(mappedBy: "post", targetEntity: ELike::class, cascade: ["persist", "remove"])]
    private Collection $likes;
   
    private static $entity = EPost::class;

    /** CONSTRUCTOR */
    public function __construct($title, $description, $category){
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->creation_time = new DateTime("now");
        $this->isRemoved = false;
        $this->images = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->likes = new ArrayCollection();   
    }

    
    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdPost(): ?int { return $this->idPost; }

    public function getTitle(): string { return $this->title; }

    public function getDescription(): string { return $this->description; }

    public function getCategory(): string { return $this->category; }

    public function getCreationTime(): DateTime { return $this->creation_time; }

    public function getCreationTimeStr(): string { return $this->creation_time->format('Y-m-d H:i:s'); }

    public function getIsRemoved(): bool { return $this->isRemoved; }

    public function getProfile(): EProfile { return $this->profile; }

    public function getImages(): Collection { return $this->images; }

    public function getComments(): Collection { return $this->comments; }

    public function getLikes(): Collection { return $this->likes; }

    //public function getComments(): ArrayCollection { return $this->comments; }
    //public function getLikes(): ArrayCollection { return $this->likes; }


    /** SETTERS */    
    //Doctrine gestisce automaticamente l’id, il metodo setIdPost() non serve e può causare problemi

    public function setTitle(string $title): void { $this->title = $title; }

    public function setDescription(string $description): void { $this->description = $description; }

    public function setCategory(string $category): void { $this->category = $category; }

    public function setCreationTime(DateTime $dateTime): void{ $this->creation_time = $dateTime; }

    public function setRemoved(bool $isRemoved): void { $this->isRemoved = $isRemoved; } 

    public function setProfile(EProfile $profile): void { $this->profile = $profile; }

    public function addImage(EImage $image): void {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setPost($this);
        }
    }

    public function addComment(EComment $comment): void {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setPost($this);
        }
    }

    public function addLike(ELike $like): void {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setPost($this);
        }
    }
}

/**public function addImage(EImage $image): void {
        $imageId = $image->getIdImage(); // Assuming you have a method to get the image ID
        // Check if the image with the same ID exists in the images array
        $imageExists = false;
        foreach ($this->images as $existingImage) {
            if ($existingImage->getIdImage() === $imageId) {
                $imageExists = true;
                break;
            }
        }
        // If the image doesn't exist in the array, add it
        if (!$imageExists) {
            $this->images[] = $image;
            $image->setPost($this);
        }
    }  
    
    public function addComment(EComment $comment): void {
        $commentId = $comment->getIdComment(); // Assuming you have a method to get the comment ID
        // Check if the comment with the same ID exists in the comment array
        $commentExists = false;
        foreach ($this->comments as $existingComment) {
            if ($existingComment->getIdComment() === $commentId) {
                $commentExists = true;
                break;
            }
        }
        // If the comment doesn't exist in the array, add it
        if (!$commentExists) {
            $this->comments[] = $comment;
            $comment->setPost($this);
        }
    }
    
    public function addLike(ELike $like): void {
        $likeId = $like->getIdLike(); // Assuming you have a method to get the like ID
        // Check if the like with the same ID exists in the likes array
        $likeExists = false;
        foreach ($this->likes as $existingLike) {
            if ($existingLike->getIdLike() === $likeId) {
                $likeExists = true;
                break;
            }
        }
        // If the like doesn't exist in the array, add it
        if (!$likeExists) {
            $this->likes[] = $like;
            $like->setPost($this);
        }
    } 
 */



    