<?php

//Database Connection
define('DB_HOST', 'localhost');
define('DB_NAME', 'RecipeekDB');
define('DB_USER', 'root');
define('DB_PASS', '');

//Web APP parameter for custom app
define('MAX_VIP', 3);
define('HOME_POSTS_LIMIT', 10);
define('MAX_WARNINGS', 3);
define('MAX_IMAGE_SIZE', 5242880); // 5MB
define('ALLOWED_IMAGE_TYPE',['image/jpeg', 'image/png', 'image/jpg']);

//session coockie expiration
define('COOKIE_EXP_TIME', 2592000); // 30 days in seconds

//define('DIRECTORY_SEPARATOR', '/appORM/');

//Api constants
define('CLIENT_ID', ''); // Cambia con il tuo client ID FatSecret
define('CLIENT_SECRET', ''); // Cambia con il tuo client secret FatSecret



// Stripe API
require_once __DIR__ . '/../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_TUA_CHIAVE_SEGRETA'); // Cambia con la tua chiave segreta Stripe
define('STRIPE_PUBLIC_KEY', 'pk_test_TUA_CHIAVE_PUBBLICA'); // Chiave pubblica per JS
