<?php

require_once "bootstrap.php";
require_once __DIR__ . "/config/StartSmarty.php";
require_once __DIR__ . "/config/Installation.php";
require_once "autoloader.php";
require_once __DIR__ . '/vendor/autoload.php';

require_once "foundation/FEntityManager.php";

Installation::install();
(new CFrontController())->run();

//include_once "placeholder.php";
//populateDatabase();

//CRecipe::loadMeal("Banana");
/*
$banana = UApiClient::getInstance()->searchFood("philadelphia");
//var_dump($banana);

$emeals = EMeal::fromFatSecretJson($banana);
foreach ($emeals as $emeal) {
    echo $emeal->toString();
}

//$fc->run("localhost/User/login");

//$posts = FPersistentManager::getInstance()->loadHomePage(4);
//var_dump($posts[0][0]->getComments()[0]->getBody());

/* $users = FEntityManager::getInstance()->getObjList(EUser::class, 'gender', 'M');

foreach ($users as $user) {
    echo $user->getUsername() . "<br>";
} */
