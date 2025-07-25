<?php

class CProfile {

    /**
     * Displays the profile of the logged-in user.
     * @return void
     */
    public static function profile() {
        CUser::checkValation();

        $profileInfos = FPersistentManager::getInstance()->getProfileInfo(USession::getInstance()->get('user'));

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view = new VProfile();
        $view->displayProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers']);
    }

    public static function visitProfile($visitedId) {
        CUser::checkValation();

        $visitingId = USession::getInstance()->get('user');
        if ($visitedId == $visitingId) {
            header('Location: /recipeek/Profile/profile');
            exit;
        }
        $profileInfos = FPersistentManager::getInstance()->getProfileInfo($visitedId, $visitingId);

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view = new VProfile();
        $view->visitProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers'], $profileInfos['isFollowed']);
    }

    public static function findProfile() {
        CUser::checkValation();

        $view = new VProfile();
        $view->profileFilter();
    }

    // -------------------- BEHAVIOR METHODS -------------------- //

    public static function follow() {
        $followerId = USession::getInstance()->get('user');
        $followedId = UHTTPMethods::post('profileId');

        $follow = new EUserFollow($followerId, $followedId);
        FPersistentManager::getInstance()->saveFollow($follow);
    }

    public static function unfollow() {
        $followerId = USession::getInstance()->get('user');
        $followedId = UHTTPMethods::post('profileId');

        FPersistentManager::getInstance()->removeFollow($followerId, $followedId);
    }

    // -------------------- EDIT METHODS -------------------- //

    public static function updateField() {
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        $field = UHTTPMethods::post('field');
        $value = UHTTPMethods::post('value');

        if (empty($value)) {
            CError::showError('Il campo non può essere vuoto');
            return;
        }

        $pm = FPersistentManager::getInstance();
        $user = $pm->getUserById($userId);

        switch ($field) {
            case 'username':
                if ($pm->existUser($value)) {
                    CError::showError('Username già in uso');
                    return;
                }
                $user->setUsername($value);
                break;
            case 'bio':
                $user->setBio($value);
                break;
            case 'email':
                if ($pm->existEmail($value)) {
                    CError::showError('Email già in uso');
                    return;
                }
                $user->setEmail($value);
                break;
            case 'nickname':
                $user->setNickname($value);
                break;
            default:
                CError::showError('Campo non valido');
                return;
        }

        $pm->saveUser($user);

        header('Location: /recipeek/Profile/profile');
        exit;
    }

    public static function updateName() {
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        $name = UHTTPMethods::post('name');
        $surname = UHTTPMethods::post('surname');

        if (empty($name)) {
            CError::showError('Il nome non può essere vuoto');
            return;
        }

        $pm = FPersistentManager::getInstance();
        $user = $pm->getUserById($userId);
        $user->setName($name);
        $user->setSurname($surname);
        $pm->saveUser($user);

        header('Location: /recipeek/Profile/profile');
        exit;
    }

    public static function updatePassword() {
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        $currentPassword = UHTTPMethods::post('currentPassword');
        $newPassword = UHTTPMethods::post('newPassword');
        $confirmPassword = UHTTPMethods::post('confirmPassword');

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            CError::showError('I campi non possono essere vuoti');
            return;
        }
        if ($newPassword !== $confirmPassword) {
            CError::showError('Le nuove password non corrispondono');
            return;
        }
        if ($newPassword === $currentPassword) {
            CError::showError('La nuova password deve essere diversa dalla password attuale');
            return;
        }

        $pm = FPersistentManager::getInstance();
        $user = $pm->getUserById($userId);

        if (!password_verify($currentPassword, $user->getPassword())) {
            CError::showError('La password attuale non è corretta');
            return;
        }

        $user->setPassword($newPassword);
        $pm->saveUser($user);

        header('Location: /recipeek/Profile/profile');
        exit;
    }

    public static function updatePicture() {
        CUser::checkValation();

        $userId = USession::getInstance()->get('user');
        $imageData = UHTTPMethods::saveUploadedFile('image', 'propic');
        
        if ($imageData['error']) {
            CError::showError($imageData['error']);
            return;
        }

        $pm = FPersistentManager::getInstance();
        $user = $pm->getUserById($userId);
        $image = new EImage($imageData['name'], $imageData['size'], $imageData['ext'], $imageData['path']);
        $user->setProPic($image);
        $pm->saveUser($user);

        header('Location: /recipeek/Profile/profile');
        exit;
    }

    
}