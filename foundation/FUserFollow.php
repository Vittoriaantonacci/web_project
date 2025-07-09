<?php

class FUserFollow{

    public static function getFollowedNum($idUser){
        return FEntityManager::getInstance()->getCountObjectByValue(EUserFollow::getEntity(), 'idFollower', $idUser);
    }

    public static function getFollowerNum($idUser){
        return FEntityManager::getInstance()->getCountObjectByValue(EUserFollow::getEntity(), 'idFollowed', $idUser);
    }

    public static function getFollowedUsers($idUser){
        $followedId = FEntityManager::getInstance()->getObjList(EUserFollow::class, 'idFollower', $idUser);
        $ris = [];
        foreach ($followedId as $followed) {
            array_push($ris, FPersistentManager::getInstance()->getUserById($followed->getIdFollowed()));
        }
        return $ris;
    }

    public static function getFollowerUsers($idUser){
        $followersId = FEntityManager::getInstance()->getObjList(EUserFollow::class, 'idFollowed', $idUser);
        $ris = [];
        foreach ($followersId as $follower) {
            array_push($ris, FPersistentManager::getInstance()->getUserById($follower->getIdFollower()));
        }
        return $ris;
    }

    public static function getTopUserFollower(){
        $query = FEntityManager::getInstance()::getEntityManager()->createQuery("SELECT uf.idFollowed, COUNT(uf.idFollowed) as followCount
            FROM EUserFollow uf
            GROUP BY uf.idFollowed
            ORDER BY followCount DESC")
            ->setMaxResults(MAX_VIP);

        try {
            $result = $query->getResult();
        }catch (\Exception $e) {
            echo "ERROR " . $e->getMessage();
            return [];
        }
        return $result;
    }

    public static function getUserFollow($idfollower, $idFollowed){
        return FEntityManager::getInstance()->getObjByTWOValues(EUserFollow::getEntity(), 'idFollower', $idfollower, 'idFollowed', $idFollowed);
    }
}