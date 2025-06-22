<?php

/**
 * UServer - Utility class for managing superglobal array $_SERVER.
 */
class UServer {
    /**
     * Singleton instance of UServer.
     */
    private static ?UServer $instance = null;

    /**
     * Private constructor to prevent instantiation.
     */
    static function getInstance(): UServer {
        if (isset($_SERVER['singleton'])) {
            UServer::$instance = $_SERVER['singleton'];
        }else {
            UServer::$instance = new UServer();
            $_SERVER['singleton'] = UServer::$instance;
        }
        return UServer::$instance;
    }

    /**
     * @return string Return the request method (GET, POST, etc.)
     */
    public static function getRequestMethod(): string {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * @return string Return the given url request
     */
    public static function getRequestUrl(): string {
        return $_SERVER['REQUEST_URI'] ?? '/recipeek/User/login';
    }
}