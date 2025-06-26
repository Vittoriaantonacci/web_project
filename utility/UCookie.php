<?php

/**
 * UCookie - Utility class for managing supergolbal array $_COOKIE.
 */
class UCookie {
    /**
     * Set a cookie with the given name, value, and expiration time.
     * @param string $name The name of the cookie.
     * @param string $value The value of the cookie.
     * @param int $expire The expiration time in seconds.
     */
    public static function set(string $name, string $value, int $expire = 3600): void {
        setcookie($name, $value, time() + $expire, "/");
    }

    /**
     * Get the value of a cookie by its name.
     * @param string The name of the cookie.
     * @return string|null The value of the cookie or null if not set.
     */
    public static function get(string $name): ?string {
        return $_COOKIE[$name] ?? null;
    }

    /**
     * Delete a cookie by its name.
     * @param string The name of the cookie to delete.
     */
    public static function delete(string $name): void {
        setcookie($name, '', time() - 42000, "/");
    }

    public static function deleteSessionParams(string $name) {
        $cookieParams = session_get_cookie_params();
        setcookie($name, '', time() - 42000, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly']);
    }

    /**
     * Check if a specific id is stored into a cookie.
     * @return bool
     */
    public static function isset(string $id): bool {
        return isset($_COOKIE[$id]);
    }
}