<?php

// 1 - Dès qu'on a des données qui doivent persister d'une requete à une autre, on utilise les sessions.
// 2 - Une Session est un Tableau Associatif

// Cette Classe fera la Gestion des Sessions
class Session {

    // Méthode qui crée une Session
    public static function start() {
        session_start(); // Lance la session. Le serveur crée derrière un tableau $_SESSION
    }

    // Méthode qui permet de stocker une donnée dans une clé de la session
    public static function set($key, $data) {
        $_SESSION[$key] = $data;
    }

    // Méthode qui permet de récupérer une donnée dans une clé de la session
    public static function get($key) {
        // On vérifie d'abord si la clé existe. Si oui on retourne la valeur correspondante
        if (self::exists($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    // Méthode qui permet de vérifier si une clé existe dans la session
    public static function exists($key): bool {
        return isset($_SESSION[$key]); // retourne true ou false
    }

    // Méthode qui permet de supprimer une clé dans la session
    public static function unset($key) {
        unset($_SESSION[$key]);
    }

    // Méthode qui permet de détruire complètement la session
    public static function destroy() {
        session_unset();  
        session_destroy(); // Supprime le tableau $_SESSION
    }

}

?>