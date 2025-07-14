<?php
/**
 * The EMod class is an extension of the EUser class.
 * This class was created because the types of users in the application are different.
 */

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "moderators")]

class EMod extends EUser{

    #[ORM\Column(type: "string")]
    private string $role;
    
    #[ORM\Column(type: "string")]
    private string $permission;

    private static string $entity = EMod::class;

    /** CONSTRUCTOR */
    public function __construct($name, $surname, $birthDate, $gender, $email, $password, $username) {
        parent::__construct($name, $surname, $birthDate, $gender, $email, $password, $username);
        $this->role = "moderator";
        $this->permission = "moderate";
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getRole(): string { return $this->role; }

    public function getPermission(): string { return $this->permission; }


    /** SETTERS */
    public function setRole(string $role): void { $this->role = $role; }

    public function setPermission(string $permission): void { $this->permission = $permission; }
}

