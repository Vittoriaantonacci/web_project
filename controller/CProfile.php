<?php

class CProfile {

    /**
     * Displays the profile of the logged-in user.
     * @return void
     */
    public static function profile() {
        $profileInfos = FPersistentManager::getInstance()->getProfileInfo(USession::getInstance()->get('user'));

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view = new VProfile();
        $view->displayProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers']);
    }

    public static function visitProfile($idProfile) {
        $profileInfos = FPersistentManager::getInstance()->getProfileInfo($idProfile);

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view = new VProfile();
        $view->visitProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers']);
    }
}