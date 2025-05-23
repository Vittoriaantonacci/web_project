<?php

require_once "bootstrap.php";
require_once "config/Installation.php";
include_once(__DIR__ .  '/entity/EPost.php');

Installation::install();

$newUser = (new EPost("aaa", "bbb", "ccc"));

$entityManager = getEntityManager();

$entityManager->persist($newUser);
$entityManager->flush();

echo "daje";