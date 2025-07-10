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
$post = FPersistentManager::getInstance()->getPostById(1);

$likes = $post->getLikes()->toArray();

foreach ($likes as $like) {
    echo "ciao";
}*/









