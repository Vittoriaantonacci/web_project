<?php

/**
 * FUser class provides query for EUser objects
 * @author Group Antonacci-Salvatore-DiMichele
 */

class FUser {
    public static function getUserByUsername($username){
        return FEntityManager::getInstance()->getObjByValue(EProfile::getEntity(), 'username', $username);
    }
}