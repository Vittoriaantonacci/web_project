<?php

class CUser {


    /** -------------------- USER CHECK METHODS -------------------- */

     /**
     * check if the user is logged (using session)
     * @return boolean
     */
    public static function isLogged(){
        /*
        $logged = false;

        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('user')){
            $logged = true;
            self::isBanned();
        }
        if(!$logged){
            header('Location: /Agora/User/login');
            exit;
        }
        return true;
        */
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

    public static function login() {}

    public static function register() {}

    public static function checkLogin() {}

    public static function logout() {}


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




}