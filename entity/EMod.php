<?php
/**
 * The EMod class is an extension of the EUser class.
 * This class was created because the types of users in the application are different.
 */


/*
require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "mod")]

class EMod extends EUser{

    #[ORM\Column(type: "string")]
    protected string $role;
    
    #[ORM\Column(type: "string")]
    protected string $permission;


    public string $discr = "moderator";

    private static string $entity = EMod::class;

    public static function getEntity(): string { return self::$entity; }
 }

*/