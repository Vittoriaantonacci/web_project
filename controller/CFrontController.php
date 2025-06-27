<?php

class CFrontController{
    
    public function run(){
        // Parse the request URI
        //echo $requestUrl;
        
        $requestUrl = UServer::getInstance()->getRequestUrl();
        //$requestUrl = "/recipeek/User/homePage"; 
        $requestUrl = trim($requestUrl, '/');
        $urlParts = explode('/', $requestUrl);
        array_shift($urlParts);
        //var_dump($urlParts);

        // Extract controller and method names
        $controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) : 'User';
        //var_dump($controllerName);
        $methodName = !empty($urlParts[1]) ? $urlParts[1] : 'login';
        //var_dump($methodName);
        // Load the controller class
        $controllerClass = 'C' . $controllerName;
        //var_dump($controllerClass);
        $controllerFile = __DIR__ . "/{$controllerClass}.php";
        //var_dump($controllerFile);

        if (file_exists($controllerFile)) {
            // Check if the method exists in the controller
            if (method_exists($controllerClass, $methodName)) {
                // Call the method
                $params = array_slice($urlParts, 2); // Get optional parameters
                call_user_func_array([$controllerClass, $methodName], $params);
            } else {
                // Method not found, handle appropriately (e.g., show 404 page)
                CError::showError('Metodo non trovato');
                
            }
        } else {
            // Controller not found, handle appropriately (e.g., show 404 page)
            CError::showError('Controller non trovato');
        }
    }
}