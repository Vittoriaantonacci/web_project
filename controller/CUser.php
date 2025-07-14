<?php

class CUser {


    /** -------------------- USER STATUS METHODS -------------------- */

     /**
     * check if the user is logged (using session)
     * @return boolean
     */
    public static function isLogged(){
        if(UCookie::isset('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isset('user')){
            return true;
        }
        return false;
    }

    /**
     * check if the user is logged and is a VIP user
     * @return boolean
     */
    public static function isVip(){
        if(!CUser::isLogged()){
            return false;
        }
        $userId = USession::getInstance()->get('user');
        $user = FPersistentManager::getInstance()->getUserById($userId);
        if($user->getIsVip()){
            return true;
        }
        return false;
    }

    /**
     * check if the user is banned
     * @param int|null $idUser
     * If idUser is null, it will check the current user
     * If idUser is not null, it will check the user with the given id
     * @return bool | void
     * If the user is banned, it will remove the session and redirect to the login page
     * If the user is not banned, it will return false
     */
    public static function isBanned($idUser = null){
        if ($idUser === null) {
            if (!CUser::isLogged()) {
                return false;
            }
            $idUser = USession::getInstance()->get('user');
            $user = FPersistentManager::getInstance()->getUserById($idUser);
            if($user->getIsBanned()){
                USession::remove('user');
                USession::unset();
                USession::destroy();
                header('Location: /recipeek/User/login');
            }
        } else {
            $user = FPersistentManager::getInstance()->getUserById($idUser);
            if($user->getIsBanned()){
                return true;
            }
            return false;
        }
    }

    /**
     * check if the user is an admin
     * @return boolean | void
     */
    public static function isAdminOrMod() {
        if (!CUser::isLogged()) {
            return false;
        }
        $userId = USession::getInstance()->get('user');
        $user = FPersistentManager::getInstance()->getUserById($userId);
        if ($user->getEntity() === EMod::getEntity()) {
            header('Location: /recipeek/User/dashboard');
            exit;
        }
        return false;
    }

    public static function checkValation() {
        if (!CUser::isLogged() || CUser::isBanned()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    }

    public static function requireVip($itemCategory) {
        if (!CUser::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
        if (strpos($itemCategory, "#") !== false && !CUser::isVip()) {
            header('Location: /recipeek/User/subscribe');
            exit;
        }
    }


    /** -------------------- LOGIN & REGISTRATION METHODS -------------------- */

    // This methos is used to show login page and to handle the session
    public static function login() {
        if(USession::isset('user')){
            // If the user is already logged in, redirect to the home page
            header('Location: /recipeek/User/homePage');
            exit;
        }
        if(UCookie::isset('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        $view = new VUser();
        $view->login();
    }

    // This methos is used to register a new user in database when the user fills the registration form
    // if the user is already registered, it will redirect to the login page with an error message, otherwise it will create the user and redirect to the login page
    public static function register() {
        $view = new VUser();

        if (!(FPersistentManager::getInstance()->existUserAndEmail(UHTTPMethods::post('username'), UHTTPMethods::post('email')))) {
            $created = FPersistentManager::getInstance()->createUser(
                UHTTPMethods::post('name'),
                UHTTPMethods::post('surname'),
                UHTTPMethods::post('birthDate'),
                UHTTPMethods::post('gender'),
                UHTTPMethods::post('email'),
                UHTTPMethods::post('password'),
                UHTTPMethods::post('username')
            );
            $created? $view->login() : $view->login("Error in creating new profile, please retry.", "register"); // error in creating user
            return;
        }
        $view->login("Sorry, the username or the email already exists.", "register"); // uername or email already exists
    }

    // this methos is used to check the login credentials of the user when the user submits the login form
    public static function checkLogin() {
        try {
            $view = new VUser();
            
            $user = FPersistentManager::getInstance()->getUserByUsername(UHTTPMethods::post('username'));
        
            if ($user !== null) {
                if (password_verify(UHTTPMethods::post('password'), $user->getPassword())) {
                    if ($user::getEntity() === EProfile::getEntity() && $user->getIsBanned()) {
                        $view->login("Account banned.");
                    } else {
                        if (USession::status() == PHP_SESSION_NONE) {
                            USession::getInstance();
                        }
                        USession::set('user', $user->getIdUser());
                        CUser::isAdminOrMod();

                        header('Location: /recipeek/User/homePage');
                        exit;
                    }
                } else {
                    $view->login("Password errata.");
                }
            } else {
                $view->login("Username errato.");
            }
        
        } catch (\Throwable $e) {
            echo "<pre>ERRORE: " . $e->getMessage() . "</pre>";
            // oppure loggalo su un file
        }
    } 

    /**
     * This method is used to show the user profile page.
     * It will load the user profile from the database and display it.
     */
    public static function subscribe(){
        CUser::isLogged();

        $view = new VUser();
        $view->subscribe();
    }

    /**
     * This method is used to handle the subscription checkout process.
     * It will set the user as VIP in the database.
     */
    public static function subCheckout(){
        CUser::isLogged();

        $userId = USession::getInstance()->get('user');
        $user = FPersistentManager::getInstance()->getUserById($userId);

        $user->setVip(true);
        FPersistentManager::getInstance()->saveUser($user);

        header('Location: /recipeek/User/homePage');
        exit;
    }

    // this method is used to logout the user, it will remove the session and redirect to the login page
    public static function logout() {
        USession::getInstance();
        if(USession::isset('user')){
            USession::remove('user');
            USession::unset();
            USession::destroy();
        }
        header('Location: /recipeek/User/login');
    }


    /** -------------------- LOADING INFO METHODS --------------------  */

    public static function dashboard($profileId = null) {
        //CUser::checkValation();

        //$userId = USession::getInstance()->get('user');
        $userId = 1;

        $mod = FPersistentManager::getInstance()->getUserById($userId);

        $view = new VUser();
        if ($profileId === null) {
            $view->dashboard($mod, null);
            exit;
        } else {
            $profile = FPersistentManager::getInstance()->getUserById($profileId);
            if ($profile === null) {
                CError::showError('Profilo non trovato');
                exit;
            }
            $view->dashboard($mod, $profile);
            exit;
        }
        CError::showError('Errore nel caricamento del profilo', 404);
        exit;
    }

    public static function homePage(){
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        
        $postInHome = FPersistentManager::getInstance()->loadHomePage($userId);
        $postForYou = FPersistentManager::getInstance()->loadForYouPage($userId);
        
        $view = new VUser();
        $view->home($postInHome, $postForYou);

    }   

    public static function filter(){
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        

        $user = FPersistentManager::getInstance()->getUserById($userId);

        $view = new VUser();
        $view->filter(isVip: $user->getIsVip() ?? false);

    }

    public static function filter_api() {
        CUser::checkValation();

        $pm = FPersistentManager::getInstance();

        $category = UHTTPMethods::post('category');

        $posts = $pm->getPostsByCategory($category);
        $recipes = $pm->getRecipesByCategory($category);
        $mealPlans = $pm->getMealPlansByCategory($category);

        $postArray = array_map(function ($post) {
            return [
                'id' => $post->getIdPost(),
                'title' => $post->getTitle(),
                'description' => $post->getDescription(),
                'created' => $post->getCreationTimeStr(),
                'category' => $post->getCategory(),
                'username' => $post->getProfile()->getUsername(),
            ];
        }, $posts);

        $recipeArray = array_map(function ($recipe) {
            return [
                'id' => $recipe->getIdRecipe(),
                'title' => $recipe->getNameRecipe(),
                'description' => $recipe->getDescription(),
                'created' => $recipe->getCreationTimeStr(),
                'category' => $recipe->getCategory(),
                'username' => $recipe->getCreator()->getUsername(),
            ];
        }, $recipes);

        $mealPlanArray = array_map(function ($mp) {
            return [
                'id' => $mp->getIdMealPlan(),
                'name' => $mp->getNameMealPlan(),
                'description' => $mp->getDescription(),
                'created' => $mp->getCreationTimeStr(),
                'category' => $mp->getCategory(),
                'username' => $mp->getCreator()->getUsername(),

            ];
        }, $mealPlans);

        $result = [
            'posts' => $postArray,
            'recipes' => $recipeArray,
            'mealPlans' => $mealPlanArray
        ];

        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    public static function userfilter_api() {
        $pm = FPersistentManager::getInstance();

        $input = UHTTPMethods::post('category');
        
        $users = $pm->getFilteredUsers($input);

        $result = [
            'users' => array_map(function ($user) {
                return [
                    'id' => $user->getIdUser(),
                    'username' => $user->getUsername(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'propic' => $user->getProPic() !== null ? '/recipeek/public/uploads/propic/' + $user->getProPic()->getImagePath() : '/recipeek/public/default/profile_ph.png',
                ];
            }, $users)
        ];
        
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

}