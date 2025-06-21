<?php
/**
 * La classe EMod è un'estensione della classe EUser. Questa classe nasce poichè i tipi di utilizzatori dell'applicazione in questione sono diversi. 
 * Contiene i seguenti attributi:
 * - role: indica il ruolo;
 * - permission:
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