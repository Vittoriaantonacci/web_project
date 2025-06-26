<?php
/**
  * La classe EComment contiene tutti gli attributi e metodi riguardanti i commenti. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idComment: è un identificativo del commento stesso;
  * - body: testo/corpo del commento;
  * - isRemoved: commento rimosso o no;
  * - user: oggetto EUser relativo all'autore del commento;
  * - post: post al quale appartiene il commento;
  * - creation_time: data e ora del commento;
  * - isPinned: commento fissato o no; 
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
    private ?int $idComment = null; //l’id può essere null finché Doctrine non lo assegna
   
    #[ORM\Column(type: "text")]
    private string $body;
    
    #[ORM\Column(type: "boolean")]
    private bool $isRemoved;
   
    #[ORM\ManyToOne(targetEntity: EUser::class, inversedBy: "comment", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser")]
    private EUser $user;
    
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

    public function getUser(): EUser { return $this->user; }

    public function getPost(): EPost { return $this->post; }

    public function getCreationTime(): DateTime { return $this->creation_time; }

    public function getCreationTimeStr(): string { return $this->creation_time->format('Y-m-d H:i:s'); }

    public function getIsPinned(): bool { return $this->isPinned; }

    //metodo per ottenere l'username dell'autore del commento
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