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
     * Return session status.
     * 
     * @return int
     */
    public function getStatus(): int {
        return session_status();
    }

    /**
     * Get a session variable by its name.
     * 
     * @param string $name
     * @return mixed
     */
    public static function getSessionVariable(string $name): mixed {
        return $_SESSION[$name] ?? null;
    }

    /**
     * Set a session variable.
     * 
     * @param string $name
     * @param mixed $value
     */
    public static function setSessionVariable(string $name, mixed $value): void {
        $_SESSION[$name] = $value;
    }

    /**
     * Unset a entire session.
     */
    public static function unsetSession(): void {
        session_unset();
    }

    /**
     * Destroy the session.
     */
    public static function destroySession(): void {
        session_destroy();
    }

    /**
     * Unset a specific session variable.
     */
    public static function unsetVariable(string $name): void {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * Check if a specific session variable is set.
     * 
     * @param string $name
     * @return bool
     */
    public static function isSet(string $name): bool {
        return isset($_SESSION[$name]);
    }

}