<?php

require_once "bootstrap.php";
require_once "autoloader.php";
require_once __DIR__ . "/config/StartSmarty.php";
require_once __DIR__ . "/config/Installation.php";
require_once __DIR__ . '/vendor/autoload.php';


Installation::install();
(new CFrontController())->run();











