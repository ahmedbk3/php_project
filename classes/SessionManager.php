<?php

class SessionManager {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function increment($key) {
        if (isset($_SESSION[$key])) {
            $_SESSION[$key]++;
        } else {
            $_SESSION[$key] = 1;
        }
    }

    public static function reset() {
        $_SESSION = [];
        session_destroy();
        header("Location: index.php");
    }

    public static function welcome() {
        if (!isset($_SESSION['visits'])) {
            $_SESSION['visits'] = 1;
            return "Bienvenue à notre plateforme.";
        } else {
            $_SESSION['visits']++;
            return "Merci pour votre fidélité, c'est votre {$_SESSION['visits']} éme visite.";
        }
    }
}
?>
