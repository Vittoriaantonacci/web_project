<?php
/**
 * The EUser class contains all attributes and methods related to the user.
 * It includes the following attributes (with corresponding methods):
 * - idUser: the unique identifier of the user;
 * - name: the user's first name;
 * - surname: the user's last name;
 * - birthDate: the user's date of birth;
 * - gender: the user's gender;
 * - email: the email the user chooses to register and log in with;
 * - password: the password the user chooses to register and log in with;
 * - username: the username the user chooses to register and log in with;
 */


require_once('vendor/autoload.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "users")]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discr", type: "string")] //definisce la colonna che distinguerà tra EUser e EProfile
#[ORM\DiscriminatorMap(["user" => EUser::class, "profile" => EProfile::class])] //associa i valori della colonna ai nomi delle classi

class EUser{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    protected int $idUser;

    #[ORM\Column(type: "string")]
    protected string $name;
   
    #[ORM\Column(type: "string")]
    protected string $surname;
    
    #[ORM\Column(type: "datetime")]
    protected DateTime $birthDate;
    
    #[ORM\Column(type: "string")]
    protected string $gender;
  
    #[ORM\Column(type: "string")]
    protected string $email;
    
    #[ORM\Column(type: "string")]
    protected string $password;
   
    #[ORM\Column(type: "string")]
    protected string $username;

    private static  $entity = EUser::class;

    /** CONSTRUCTOR */
    public function __construct($name,$surname, $birthDate, $gender, $email, $password, $username){
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->username = $username;
    }

    /**GETTERS */
    public static function getEntity(): string { return self::$entity; }

    public function getIdUser(): ?int { return $this->idUser; }

    public function getName(): string { return $this->name; }

    public function getSurname(): string { return $this->surname; }

    public function getBirthDate(): DateTime { return $this->birthDate; }

    public function getBirthDateStr(): string { return $this->birthDate->format('Y-m-d'); }

    public function getGender(): string { return $this->gender; }

    public function getEmail(): string { return $this->email; }

    public function getPassword(): string { return $this->password; }

    public function getUsername(): string { return $this->username; }


    /**SETTERS */
    public function setName(string $name): void { $this->name = $name; }

    public function setSurname(string $surname): void { $this->surname = $surname; }

    public function setBirthDate(DateTime $birthDate): void { $this->birthDate = $birthDate; }

    public function setGender(string $gender): void { $this->gender = $gender; }

    public function setEmail(string $email): void { $this->email = $email; }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_DEFAULT); }

    public function setHashedPassword(string $hashedPassword): void { $this->password = $hashedPassword; }

    public function setUsername(string $username): void { $this->username = $username; }
}