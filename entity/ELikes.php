<?php
/**
  * La classe ELike contiene tutti gli attributi e metodi riguardanti i like. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - idLike: è un identificativo del like stesso;
  * - user: oggetto EUser relativo all'autore del like;
  * - post: post al quale è stato messo il like; 
  * - date: data di quando è stato messo il like;
*/

require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity] 
#[ORM\Table(name: "likes")]

class ELikes{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idLike = null; //l’id può essere null finché Doctrine non lo assegna
   
    #[ORM\ManyToOne(targetEntity: EUser::class, inversedBy: "likes", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idUser", referencedColumnName: "idUser")]
    private EUser $user;
    
    #[ORM\ManyToOne(targetEntity: EPost::class, inversedBy: "likes", cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost")]
    private EPost $post;
    
    #[ORM\Column(type: "datetime")]
    private DateTime $dateLike;

    private static $entity = ELikes::class;

    /** CONSTRUCTOR */
    public function __construct() {
        $this->dateLike = new DateTime("now");
    }

    
    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdLike(): ?int { return $this->idLike; }

    public function getUser(): EUser { return $this->user; }

    public function getPost(): EPost { return $this->post; }

    public function getLikeTime(): DateTime { return $this->dateLike; }

    public function getTimeStr(): string { return $this->dateLike->format('Y-m-d H:i:s'); }

    public function getUsername(): string { return $this->user->getUsername(); }

    public function getUserId(): int { return $this->user->getIdUser(); }


    /** SETTERS */  
    public function setUser(EUser $user): void { $this->user = $user; }

    public function setPost(EPost $post): void { $this->post = $post; }

    public function setLikeTime(DateTime $dateTime): void { $this->dateLike = $dateTime; }
}
