<?php
/**
 * The EUserFollow class represents a "follow" relationship between two users.
 * It includes the following attributes (with corresponding methods):
 * - id: the unique identifier of the relationship;
 * - idFollower: the ID of the user who follows;
 * - idFollowed: the ID of the user being followed.
 */


use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity] 
#[ORM\Table(name:"userFollow")]
class EUserFollow {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private $id;

    #[ORM\Column(type:"integer")]
    private $idFollower;

    #[ORM\Column(type:"integer")]
    protected $idFollowed;

    private static $entity = EUserFollow::class;


    public function __construct($followerId, $followedId) {
        $this->idFollower = $followerId;
        $this->idFollowed = $followedId;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdFollower() { return $this->idFollower; }

    public function getIdFollowed() { return $this->idFollowed; }

    public function getId() { return $this->id; }

}