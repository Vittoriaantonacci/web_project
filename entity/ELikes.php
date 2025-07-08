<?php
/**
 * The ELike class defines all attributes and methods related to likes.
 * It includes the following attributes (with corresponding methods):
 * - idLike: a unique identifier for the like;
 * - user: an EUser object representing the author of the like;
 * - post: an EPost object to which the like was given;
 * - dateLike: the date and time when the like was made.
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
