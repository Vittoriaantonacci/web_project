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
    
    #[ORM\Column(type: "text")]
    protected string $biography;

    #[ORM\Column(type: "text")]
    protected string $info;

    #[ORM\Column(type: "boolean")]
    protected bool $vip;
   
    #[ORM\Column(type: "boolean")]
    protected bool $isBanned;

    #[ORM\OneToOne(targetEntity: EImage::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "image_id", referencedColumnName: "idImage", nullable: true)]
    private ?EImage $image = null;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: EComment::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idComment", referencedColumnName: "idComment", nullable: true)]
    protected Collection $comment;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: ELikes::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idLike", referencedColumnName: "idLike", nullable: true)]
    protected Collection $likes;

    #[ORM\OneToMany(mappedBy: "profile", targetEntity: EPost::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idPost", referencedColumnName: "idPost", nullable: true)]
    protected Collection $posts;

    #[ORM\OneToMany(mappedBy: "creator", targetEntity: EMealPlan::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idMealPlan", referencedColumnName: "idMealPlan", nullable: true)]
    protected Collection $mealPlans;

    #[ORM\OneToMany(mappedBy: "creator", targetEntity: ERecipe::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "idMealPlan", referencedColumnName: "idMealPlan", nullable: true)]
    protected Collection $recipes;

    #[ORM\ManyToMany(targetEntity: ERecipe::class)]
    #[ORM\JoinTable(name: "profile_saved_recipes",
        joinColumns: [new ORM\JoinColumn(name: "profile_id", referencedColumnName: "idUser")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "recipe_id", referencedColumnName: "idRecipe")]
    )]
    protected Collection $savedRecipes;

    #[ORM\ManyToMany(targetEntity: EMealPlan::class)]
    #[ORM\JoinTable(name: "profile_saved_meal_plans",
        joinColumns: [new ORM\JoinColumn(name: "profile_id", referencedColumnName: "idUser")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "meal_plan_id", referencedColumnName: "idMealPlan")]
    )]
    private Collection $savedMealPlans;

    #[ORM\ManyToMany(targetEntity: EPost::class)]
    #[ORM\JoinTable(name: "profile_saved_posts",
        joinColumns: [new ORM\JoinColumn(name: "profile_id", referencedColumnName: "idUser")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "post_id", referencedColumnName: "idPost")]
    )]
    private Collection $savedPosts;

    private static $entity = EProfile::class;

    /** CONSTRUCTOR */
    public function __construct($name, $surname, $birth_date, $gender, $email, $password, $username) {
        parent::__construct($name, $surname, $birth_date, $gender, $email, $password, $username);
        $this->nickname = '';
        $this->biography = '';
        $this->info = '';
        $this->posts = new ArrayCollection();
        $this->mealPlans = new ArrayCollection();
        $this->recipes = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->savedRecipes = new ArrayCollection();
        $this->savedMealPlans = new ArrayCollection();
        $this->savedPosts = new ArrayCollection();
        $this->vip = false;
        $this->isBanned = false;
        $this->nickname = $username;
    }

    /** GETTERS */
    public static function getEntity(): string { return self::$entity; }
    
    public function getNickname(): string { return $this->nickname; }

    public function getProPic(): ?EImage { return $this->image; }

    public function getBiography(): string { return $this->biography; }

    public function getInfo(): string { return $this->info; }

    public function getPosts(): Collection { return $this->posts; }

    public function getRecipes(): Collection { return $this->recipes; }

    public function getIsBanned(): bool { return $this->isBanned; }

    public function getVip(): bool { return $this->vip; }

    public function getSavedMealPlans(): Collection { return $this->savedMealPlans; }

    public function getSavedPosts(): Collection { return $this->savedPosts; }

    public function getSavedRecipes(): Collection { return $this->savedRecipes; }

    /** SETTERS */
    public function setNickname(string $nickname): void { $this->nickname = $nickname; }

    public function setProPic(?EImage $pro_pic): void { $this->image = $pro_pic; }

    public function setBiography(string $biography): void { $this->biography = $biography; }

    public function setInfo(string $info): void { $this->info = $info; }

    public function setIsBanned(bool $isBanned): void { $this->isBanned = $isBanned; }

    public function setVip(bool $vip): void { $this->vip = $vip; }


    public function addComment(EComment $comment): void {
        if (!$this->comment->contains($comment)) {
            $this->comment->add($comment);
            $comment->setProfile($this); 
        }
    }

    public function addLike(ELikes $like): void {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setUser($this);
        }
    }

    public function addPost(EPost $post): void {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setProfile($this); 
        }
    }

    public function addMealPlan(EMealPlan $mealPlan) {
        if (!$this->mealPlans->contains($mealPlan)) {
            $this->mealPlans->add($mealPlan);
            $mealPlan->setCreator($this); 
        }
    }

    public function addRecipe(ERecipe $recipe) {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->setCreator($this); 
        }
    }

    public function addSavedRecipe(ERecipe $recipe): void {
        if (!$this->savedRecipes->contains($recipe)) {
            $this->savedRecipes->add($recipe);
        }
    }

    public function addSavedMealPlan(EMealPlan $mealPlan): void {
        if (!$this->savedMealPlans->contains($mealPlan)) {
            $this->savedMealPlans->add($mealPlan);
        }
    }

    public function addSavedPost(EPost $post): void {
        if (!$this->savedPosts->contains($post)) {
            $this->savedPosts->add($post);
        }
    }



    public function removePost(EPost $post): void {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
        }
    }

    public function removeSavedMealPlan(EMealPlan $mealPlan): void {
        if ($this->savedMealPlans->contains($mealPlan)){
            $this->savedMealPlans->removeElement($mealPlan);
        }
    }

    public function removeSavedPost(EPost $post): void {
        if ($this->savedPosts->contains($post)){
            $this->savedPosts->removeElement($post);
        }
    }

    public function removeSavedRecipe(ERecipe $recipe): void {
        if ($this->savedRecipes->contains($recipe)) {
            $this->savedRecipes->removeElement($recipe);
        }
    }
}
