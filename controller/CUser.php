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
        return true;
    }

    /**
     * check if the user is banned
     * @return void
     */
    public static function isBanned()
    {
        /*
        $userId = USession::getSessionElement('user');
        $user = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $userId);
        if($user->isBanned()){
            $view = new VUser();
            USession::unsetSession();
            USession::destroySession();
            $view->loginBan();
        }
        */
        return false;
    }


    /** -------------------- LOGIN & REGISTRATION METHODS -------------------- */

    // This methos is used to show login page and to handle the session
    public static function login() {
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isset('user')){
            exit;
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
        $view = new VUser();
        
        $user = FPersistentManager::getInstance()->getUserByUsername(UHTTPMethods::post('username'));
        if($user != null){
            if(password_verify(UHTTPMethods::post('password'), $user->getPassword())){
                if($user->isBanned()){
                    //$view->loginBan();
                }elseif(USession::status() == PHP_SESSION_NONE){
                    USession::getInstance();
                    USession::set('user', $user->getId());
                    header('Location: /recipeek/User/homePage');
                }
            }
        }else{
            $view->login("Sorry, the username or the password is incorrect.");
        }
    }

    // this method is used to logout the user, it will remove the session and redirect to the login page
    public static function logout() {
        if(USession::isset('user')){
            USession::remove('user');
            USession::unset();
            USession::destroy();
        }
        header('Location: /recipeek/User/login');
    }


    /** -------------------- LOADING INFO METHODS --------------------  */
    public static function homePage(){
        if(CUser::isLogged()){
            $view = new VUser();

            //$userId = USession::getInstance()->getSessionElement('user');
            //$userAndPropic = FPersistentManager::getInstance()->loadHomePage($userId);
            $userId = 1;
            //load all the posts of the users who you follow(post have user attribute) and the profile pic of the author of teh post
            $postInHome = FPersistentManager::getInstance()->loadHomePage($userId);
            
            //load the VIP Users, their profile Images and the foillower number
            //$arrayVipUserPropicFollowNumb = FPersistentManager::getInstance()->loadVip();

            //var_dump($userAndPropic[0][1]->getImageData());

            //var_dump($userAndPropic[0][0]->getUsername());
            //$view->home($userAndPropic, $postInHome,$arrayVipUserPropicFollowNumb);

            $view->home($postInHome);
        }
    }

    public static function profile(string $username) {
        if (!self::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    
        $view = new VUser();
    
        // Recupera l'utente dal database tramite username
        $profile = FPersistentManager::getInstance()->getUserByUsername($username);
    
        // Se l'utente non esiste, mostra una pagina di errore
        if ($profile === null) {
            $view->error(); // oppure: echo "Profilo non trovato";
            return;
        }
    
        // Mostra il profilo nella view
        $view->showProfile($profile);
    }


    /** -------------------- MODIFY INFO METHODS --------------------  */

    /**
     * method to follow a user, the check is in the profile() method
     * @param int $followerId Refers to the id of a user
     */
    public static function follow($followedId){
        if(CUser::isLogged()){
            //$userId = USession::getInstance()->getSessionElement('user');
            $userId = 1;
            if($followedId == 1){
                $userId = 2;
            }
            //new Follow Object
            $follow = new EUserFollow($userId, $followedId);
            FPersistentManager::getInstance()->saveFollow($follow);
            //$visitedUser = FPersistentManager::getInstance()->getUserById(EUser::getEntity(), $followedId);
            //header('Location: /Agora/User/profile/' . $visitedUser->getUsername());
        }       
    }


    /*public static function profile(string $username) {
        if (!self::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    
        $view = new VUser();
    
        // Recupera l'utente dal database tramite username
        $profile = FPersistentManager::getInstance()->getUserByUsername($username);
    
        // Se l'utente non esiste, mostra una pagina di errore
        if ($profile === null) {
            $view->error(); // oppure: echo "Profilo non trovato";
            return;
        }
    
        // Mostra il profilo nella view
        $view->showProfile($profile);
    }*/
    
    





    public static function profile() {
        if (!self::isLogged()) {
            header('Location: /recipeek/User/login');
            exit;
        }
    
        $view = new VUser();
    
        // Istanzio un profilo di prova
        $profile = new EProfile(
            'Mario',                    // name
            'Rossi',                    // surname
            new DateTime('1990-05-15'), // birth_date
            'M',                        // gender
            'mario.rossi@email.com',    // email
            password_hash('password123', PASSWORD_DEFAULT), // password (hashed)
            'mariorossi'                // username / nickname
        );
    
        $profile->setNickname('MarioR');
        $profile->setBiography('Sono un appassionato di fitness e cucina sana.');
        $profile->setInfo('Mi piace sperimentare nuove ricette fit.');
        $profile->setVip(true);
        $profile->setIsBanned(false);
    
        $view->showProfile($profile);
    }
}