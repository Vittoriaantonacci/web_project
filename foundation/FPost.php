<?php

/**
 * FPost class provides query for EPost objects
 * @author Group Antonacci-Salvatore-DiMichele
 */

class FPost {

    public static function getUserPosts(string $userId){
        return FEntityManager::getInstance()->getObjList(EPost::getEntity(), 'userId', $userId);
    }

    public static function compareByTime(EPost $post1, EPost $post2): int {
        return $post1->getCreationTime() <=> $post2->getCreationTime();
    }

    public static function getHomePosts($idUser){
        try{
            return FEntityManager::getInstance()
                ->getEntityManager()
                ->createQuery("SELECT p FROM " . EPost::getEntity() . " p WHERE p.profile != :idUser AND p.isRemoved = false ORDER BY p.creation_time DESC")
                ->setParameter('idUser', $idUser)
                ->setMaxResults(HOME_POSTS_LIMIT)
                ->getResult();
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }

    public static function getPostByTitle(string $title){
        return FEntityManager::getInstance()->getObjListByStrPattern(EPost::getEntity(), 'title', $title);
    }
    
}