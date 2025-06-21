<?php

/**
 * Autoload
 * This function take the class name, every class should have the initial of the package,
 * for ex. if there is a class called User in the Entity Package the class must be renamed in EUser.php,
 * and read the first letter, for each letter there is a specific folder like Entity 
 */
function my_autoloader($className) {

    $prefixes = [
        'E' => __DIR__ . '/entity/',
        'F' => __DIR__ . '/foundation/',
        'V' => __DIR__ . '/view/',
        'C' => __DIR__ . '/controller/',
        'U' => __DIR__ . '/utility/',
    ];

    $firstLetter = $className[0];

    if (str_starts_with($className, 'Doctrine\\')) return;

    if (isset($prefixes[$firstLetter])) {
        $path = $prefixes[$firstLetter] . $className . '.php';
        if (file_exists($path)) {
            include_once $path;
        } else {
            error_log("Autoloader error: File not found for class $className ($path)");
        }
    } else {
        error_log("Autoloader error: Unknown class prefix for $className");
    }
}

spl_autoload_register('my_autoloader');