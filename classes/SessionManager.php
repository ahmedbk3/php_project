<?php
session_start();

class SessionManager {
    public static function welcome() {
        if (!isset($_SESSION['visits'])) {
            $_SESSION['visits'] = 1;
            return "Bienvenue à notre plateforme.";
        } else {
            $_SESSION['visits']++;
            return "Merci pour votre fidélité, c'est votre {$_SESSION['visits']} éme visite.";
        }
    }

    public static function reset() {
        session_destroy();
        header("Location: index.php");
    }
}
?>
