<?php

require_once "bootstrap.php";
require_once __DIR__ . "/config/StartSmarty.php";
require_once __DIR__ . "/config/Installation.php";
require_once "autoloader.php";
require_once __DIR__ . '/vendor/autoload.php';

require_once "foundation/FEntityManager.php";

Installation::install();
(new CFrontController())->run();

//$banana = UApiClient::getInstance()->searchFood("banana");
//var_dump($banana);
//$fc->run("localhost/User/login");

/*
$newProfile = new EProfile(
    name: "giovanih",
    surname: "nsssstant",
    birth_date: (new DateTime()),
    gender: "fefe",
    email: "djjieojioejmil@email.com",
    password: hash("sha256", "fro1234"),
    username: "giovanniiiih"
);
$newProfile->setNickname("giovanniih");

$newPost = new EPost(
    title: "eeehgia",
    description: "dsciptifefeon",
    category: "catfgry",
    profile: $newProfile,
);


$entityManager = getEntityManager();


$entityManager->persist($newPost);
$entityManager->flush();


$pc = new CUser();
$pc->follow(2);

*/


echo "dai samuuuuuuuuu";

