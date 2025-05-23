<?php
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
    private int $idPost;

    #[ORM\Column(type: "string")]
    private String $title;

    #[ORM\Column(type: "text")]
    private String $description;

    #[ORM\Column(type: "integer")]
    private String $category;

    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;

    #[ORM\Column(type: "boolean")]
    private bool $isRemoved;

    //#[ORM\Column(type: "EImage")]
    //private EImage $image;

    /**
     * @ORM\ManyToOne(targetEntity="EUser", inversedBy="posts")
     * @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     */
    //protected EUser $user;

    /*

    #[ORM\OneToMany(targetEntity: "EComment", mappedBy: "post", cascade: ["persist","remove"])] 
    private ArrayCollection $comments;

    #[ORM\OneToMany(targetEntity: "ELike", mappedBy: "post", cascade: ["persist","remove"])]
    private ArrayCollection $likes;

    */

    private static $entity = EPost::class;

    /** CONSTRUCTOR */
    public function __construct($title, $description, $category){
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->isRemoved = false;
        $this->creation_time = new DateTime("now");
        //$this->comments = new ArrayCollection();
        //$this->likes = new ArrayCollection();
    }

    /** GETTERS */
    public static function getEntity(): String { return self::$entity; } 

    public function getTime(): DateTime { return $this->creation_time; }

    public function getTimeStr(): String { return $this->creation_time->format('Y-m-d H:i:s'); }

    public function getId(): int { return $this->idPost; }

    //public function getUser(): EUser { return $this->user; }

    public function getTitle(): String { return $this->title; }

    public function getDescription(): String { return $this->description; }

    public function getCategory(): String { return $this->category; }

    public function getIsRemoved(): bool { return $this->isRemoved; }

    //public function getImage(): EImage { return $this->image; }

    //public function getComments(): ArrayCollection { return $this->comments; }

    //public function getLikes(): ArrayCollection { return $this->likes; }


    /** SETTERS */    
    //public function setUser(EUser $user): void { $this->user = $user; }

    public function setTitle(String $title): void { $this->title = $title; }

    public function setDescription(String $description): void { $this->description = $description; }

    public function setCategory(String $category): void { $this->category = $category; }

    //public function setRemove(bool $removed): void { $this->removed = $rremoved; }

    //public function setImage(EImage $image): void { $this->image = $image; }

    /*public function addComment(EComment $comment): void { 
        $this->comment[] = $comment;
        $comment->setPost($this);
    }

    public function addLike(ELike $like): void {
        $this->likes[] = $like;
        $like->setPost($this);
    }*/

 }