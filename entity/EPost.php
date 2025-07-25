<?php
/**
 * The EPost class defines all attributes and methods related to posts.
 * It includes the following attributes (with corresponding methods):
 * - idPost: a unique identifier for the post;
 * - title: the title of the post;
 * - description: the description of the post;
 * - category: the category of the post;
 * - creation_time: the date and time when the post was created;
 * - isRemoved: indicates whether the post has been removed;
 * - profile: an EProfile object representing the user profile that created the post;
 * - images: a collection of EImage objects associated with the post;
 * - comments: a collection of EComment objects related to the post;
 * - likes: a collection of ELike objects related to the post;
 */

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "post")]

class EPost{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idPost = null; 
   
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

    #[ORM\ManyToOne(targetEntity: EProfile::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser")]
    private EProfile $profile;

    #[ORM\OneToMany(mappedBy: "post", targetEntity: EImage::class, cascade: ["persist", "remove"])]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: "post", targetEntity: EComment::class, cascade: ["persist", "remove"])]
    private Collection $comments;
   
    #[ORM\OneToMany(mappedBy: "post", targetEntity: ELikes::class, cascade: ["persist", "remove"])]
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

    public function getLikedByUser($idUser): bool {
        if ($idUser === null) return false;
        if (!$this->likes instanceof Collection || $this->likes->isEmpty()) return false;
    
        foreach ($this->likes as $like) {
            if ($like->getUser()->getIdUser() === $idUser) {
                return true;
            }
        }
        return false;
    }

    
    /** SETTERS */    
    //Doctrine automatically manages the ID; the setIdPost() method is unnecessary and can cause problems 

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

    public function addLike(ELikes $like): void {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setPost($this);
        }
    }

    public function removeImage(EImage $image): void {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
        }
    }
    
    public function removeComment(EComment $comment): void {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);   
        }
    }

    public function removeLike(ELikes $like): void {
        if ($this->likes->contains($like)) {
            $this->likes->removeElement($like);
        }
    }
}


    