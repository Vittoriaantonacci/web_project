<?php

/**
 * USession - Utility class for managing superglobal array $_SESSION.
 */
class USession {
    /**
     * Siingleton instance of USession.
     */
    private static ?USession $instance = null;

    private function __construct() {
        session_set_cookie_params(COOKIE_EXP_TIME);
        session_start();
    }

    public static function getInstance(): USession {
        if (USession::$instance === null) {
            USession::$instance = new USession();
        }
        return USession::$instance;
    }

    /**
     * @param string Key and value you want to set in the session array
     * @param mixed
     */
    public static function set(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string Key of the associated value you want to return
     * @return mixed Value associated to the given key, null if not exist
     */
    public static function get(string $key): mixed {
        return $_SESSION[$key] ?? null;
    }

    /**
     * @param string Check if a value associated to given key exists
     * @return bool
     */
    public static function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    /**
     * @param string Remove the association with the given key
     */
    public static function remove(string $key): void {
        unset($_SESSION[$key]);
    }

    public static function unset(): void {
        session_unset();
    }

    public static function destroy(): void {
        session_destroy();
    }

}