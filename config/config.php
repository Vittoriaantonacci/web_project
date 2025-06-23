<?php

//Param for use Doctine ORM
define('USE_DOCTRINE', true);

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
define('CLIENT_ID', '923e7ea7b05f4da78c61ddbe0831f040');
define('CLIENT_SECRET', '37fc59391801422e86757ddfdb5e33c4');