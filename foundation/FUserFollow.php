<?php

class FUserFollow{

    public static function getFollowedNum($idUser){
        return FEntityManager::getInstance()->getCountObjectByValue(EUserFollow::getEntity(), 'idFollower', $idUser);
    }

    public static function getFollowerNum($idUser){
        return FEntityManager::getInstance()->getCountObjectByValue(EUserFollow::getEntity(), 'idFollowed', $idUser);
    }

    public static function getFollowedUsers($idUser){
        return FEntityManager::getInstance()->getObjList(EUserFollow::getEntity(), 'idFollower', $idUser);
    }

    public static function getFollowerUsers($idUser){
        return FEntityManager::getInstance()->getObjList(EUserFollow::getEntity(), 'idFollowed', $idUser);
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

    public static function getUserFollow($idUser, $idFollowed){
        return FEntityManager::getInstance()->getObjByTWOValues(EUserFollow::getEntity(), 'idFollower', $idUser, 'idFollowed', $idFollowed);
    }
}