<?php
/**
 * The EComment class defines all attributes and methods related to comments.
 * It includes the following attributes (with corresponding methods):
 * - idComment: a unique identifier for the comment;
 * - body: the text content of the comment;
 * - isRemoved: indicates whether the comment has been removed;
 * - user: an EProfile object representing the author of the comment;
 * - post: an EPost object indicating the post to which the comment belongs;
 * - creation_time: the date and time when the comment was created;
 * - isPinned: indicates whether the comment is pinned at the top.
 */


require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity] 
#[ORM\Table(name: "comment")]

class EComment{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idComment = null; 
   
    #[ORM\Column(type: "text")]
    private string $body;
    
    #[ORM\Column(type: "boolean")]
    private bool $isRemoved;
   
    #[ORM\ManyToOne(targetEntity: EProfile::class, inversedBy: "comment", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser")]
    private EProfile $user;
    
    #[ORM\ManyToOne(targetEntity: EPost::class, inversedBy: "comments", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost")]
    private EPost $post;
    
    #[ORM\Column(type: "datetime")]
    private DateTime $creation_time;
    
    #[ORM\Column(type: "boolean")]
    private bool $isPinned;

    private static $entity = EComment::class;

    /** CONSTRUCTOR */
    public function __construct($body)
    {
        $this->body = $body;
        $this->creation_time = new DateTime("now");
        $this->isRemoved = false;
        $this->isPinned = false;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdComment(): ?int { return $this->idComment; }

    public function getBody(): string { return $this->body; }

    public function getIsRemoved(): bool { return $this->isRemoved; }

    public function getUser(): EProfile { return $this->user; }

    public function getPost(): EPost { return $this->post; }

    public function getCreationTime(): DateTime { return $this->creation_time; }

    public function getCreationTimeStr(): string { return $this->creation_time->format('Y-m-d H:i:s'); }

    public function getIsPinned(): bool { return $this->isPinned; }

    public function getUsername(): string { return $this->user->getUsername(); }


    /** SETTERS */   
    //Doctrine gestisce automaticamente l’id, il metodo setIdComment() non serve e può causare problemi

    public function setBody(string $body): void { $this->body = $body; }
    
    public function setRemoved(bool $isRemoved): void { $this->isRemoved = $isRemoved; }

    public function setProfile(EProfile $user): void { $this->user = $user; }

    public function setPost(EPost $post): void { $this->post = $post; }

    public function setCreationTime(DateTime $dateTime): void { $this->creation_time = $dateTime; }

    public function setIsPinned(bool $isPinned): void { $this->isPinned = $isPinned; }  
}