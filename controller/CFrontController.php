<?php

class CFrontController{
    
    public function run(){
        $requestUrl = UServer::getInstance()->getRequestUrl();
        //$requestUrl = "/recipeek/Post/removeSave"; 

        $requestUrl = trim($requestUrl, '/');
        $urlParts = explode('/', $requestUrl);
        array_shift($urlParts);

        // Extract controller and method names
        $controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) : 'User';
        $methodName = !empty($urlParts[1]) ? $urlParts[1] : 'login';

        // Load the controller class
        $controllerClass = 'C' . $controllerName;
        $controllerFile = __DIR__ . "/{$controllerClass}.php";

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