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

    public static function visitProfile($visitedId) {
        $visitingId = USession::getInstance()->get('user');
        $profileInfos = FPersistentManager::getInstance()->getProfileInfo($visitedId, $visitingId);

        if (!$profileInfos) {
            CError::showError('Profilo non trovato');
            return;
        }

        $view = new VProfile();
        $view->visitProfile($profileInfos['user'], $profileInfos['followed'], $profileInfos['followers'], $profileInfos['isFollowed']);
    }

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
}