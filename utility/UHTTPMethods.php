<?php

/**
 * UHTTPMethods - Utility class for managing superglobal array  $_FILE, $_GET, $_POST, etc.
 */
class UHTTPMethods {
    /**
     * To access to $_POST superglobal array.
     */
    public static function post($param) {
        return $_POST[$param];
    }

    /**
     * To access to $_GET superglobal array.
     */
    public static function get($param) {
        return $_GET[$param];
    }

    /**
     * To access to $_FILES superglobal array.
     */
    public static function files(...$params) {
        if (count($params) === 0) return $_FILES;
        elseif (count($params) === 1) return $_FILES[$params[0]];
        else {
            $result = [];
            foreach ($params as $param) {
                $result[$param] = $_FILES[$param];
            }
            return $result;
        }
    }
    

}