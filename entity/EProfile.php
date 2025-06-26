<?php
/**
  * La classe EProfile è un'estensione della classe EUser e contiene tutti gli attributi e metodi riguardanti il profilo. 
  *  Contiene i seguenti attributi (e i relativi metodi):
  * - nickname: è il nome del profilo stesso;
  * - pro_pic: è l'immagine del profilo;
  * - biography: è la biografia che compare nel profilo;
  * - info: sono informazioni che l'utente può mettere sul proprio profilo;
  * - post: sono i post presenti nel profilo;
  * - vip: abbonamento si o no, quindi un utente può essere vip o meno;
  * - isBanned: si o no;
  * - meal_plans: nel profilo c'è la lista dei piani alimentari (pasti);
  * - favorites: lista di ricette favorite.
  */

require_once('vendor/autoload.php');
require_once('EUser.php');
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: "profile")] 
class EProfile extends EUser {
    
    #[ORM\Column(type: "string")]
    protected string $nickname;
   
    #[ORM\OneToOne(targetEntity: EImage::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pro_pic_id', referencedColumnName: 'idImage', nullable: true)]
    protected ?EImage $pro_pic = null;
    
    #[ORM\Column(type: "text")]
    protected string $biography;

    #[ORM\Column(type: "text")]
    protected string $info;
   
    #[ORM\OneToMany(mappedBy: "profile", targetEntity: EPost::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost", nullable: true)]
    protected Collection $posts;

    #[ORM\Column(type: "boolean")]
    protected bool $vip;
   
    #[ORM\Column(type: "boolean")]
    protected bool $isBanned;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: EMealPlan::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idMealPlan", referencedColumnName: "idMealPlan", nullable: true)]
    protected Collection $meal_plans;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: EComment::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idComment", referencedColumnName: "idComment", nullable: true)]
    protected Collection $comment;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: ELike::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "idLike", referencedColumnName: "idLike", nullable: true)]
    protected Collection $likes;
    
    #[ORM\ManyToMany(targetEntity: ERecipe::class)]
    #[ORM\JoinTable(name: "profile_favorites",
        joinColumns: [new ORM\JoinColumn(name: "profile_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "recipe_id", referencedColumnName: "idRecipe")]
    )]
    protected Collection $favorites;

    private static $entity = EProfile::class;

    /** CONSTRUCTOR */
    public function __construct($name, $surname, $birth_date, $gender, $email, $password, $username) {
        parent::__construct($name, $surname, $birth_date, $gender, $email, $password, $username);
        $this->nickname = '';
        $this->biography = '';
        $this->info = '';
        $this->posts = new ArrayCollection();
        $this->meal_plans = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->favorites = new ArrayCollection();
        $this->vip = false;
        $this->isBanned = false;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getNickname(): string { return $this->nickname; }

    public function getProPic(): ?EImage { return $this->pro_pic; }

    public function getBiography(): string { return $this->biography; }

    public function getInfo(): string { return $this->info; }

    public function getPosts(): Collection { return $this->posts; }

    public function getIsBanned(): bool { return $this->isBanned; }

    public function getVip(): bool { return $this->vip; }

    public function getMealPlans(): Collection { return $this->meal_plans; }

    public function getFavorites(): Collection { return $this->favorites; }


    /** SETTERS */
    public function setNickname(string $nickname): void { $this->nickname = $nickname; }

    public function setProPic(?EImage $pro_pic): void { $this->pro_pic = $pro_pic; }

    public function setBiography(string $biography): void { $this->biography = $biography; }

    public function setInfo(string $info): void { $this->info = $info; }

    //public function setPost(EPost $posts): void { $this->posts = $posts; }

    public function setIsBanned(bool $isBanned): void { $this->isBanned = $isBanned; }

    public function setVip(bool $vip): void { $this->vip = $vip; }

    //Method to add a meal plan to the profile
    public function addMealPlan(EMealPlan $meal_plan): void {
        $mealPlanId = $meal_plan->getIdMealPlan(); // Assuming you have a method to get the meal plan ID
        // Check if the meal plan with the same ID exists in the meal plans array
        $mealPlanExists = false;
        foreach ($this->meal_plans as $existingMealPlan) {
            if ($existingMealPlan->getIdMealPlan() === $mealPlanId) {
                $mealPlanExists = true;
                break;
            }
        }
        // If the meal plan doesn't exist in the collection, add it
        if (!$mealPlanExists) {
            $this->meal_plans->add($meal_plan);
            $meal_plan->setCreator($this);
        }
    }  

    //Method to add a post to the profile
    public function addPost(EPost $post): void {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setProfile($this); 
        }
    }

    //metodo aggiuntivo per aggiungere un commento al profilo
    public function addComment(EComment $comment): void {
        if (!$this->comment->contains($comment)) {
            $this->comment->add($comment);
            $comment->setProfile($this); 
        }
    }

    //metodo aggiuntivo per aggiungere un like al profilo
    public function addLike(ELike $like): void {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setUser($this);
        }
    }

    //Method to add a recipe to the profile
    public function addFavorite(ERecipe $recipe): void {
        if (!$this->favorites->contains($recipe)) {
            $this->favorites->add($recipe);
        }
    }

    //Method to remove a Recipe from the profile
    public function removeFavorite(ERecipe $recipe): void {
        if ($this->favorites->contains($recipe)) {
            $this->favorites->removeElement($recipe);
        }
    }
}
