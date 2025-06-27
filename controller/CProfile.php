<?php

class CProfile {

    /**
     * Displays the profile of the logged-in user.
     * @return void
     */
    public static function profile() {
        $view = new VProfile();
        
        $profileInfos = FPersistentManager::getInstance()->getProfileInfo(USession::getInstance()->get('user'));

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view->displayProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers']);
    }
}