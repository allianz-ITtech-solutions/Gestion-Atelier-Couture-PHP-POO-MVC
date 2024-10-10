<?php

// On charge tous nos éléments comme si on était dans index.php


// Controller qui gère les méthodes de connexion et authentification
class AuthController extends Controller {


    public function __construct()
    {
        // NB : Le constructeur du parent sera toujours la première instruction de l'enfant
        // On appelle le constructeur du parent qui démarre la session (une seule fois) dans le constructeur car toutes les méthodes peuvent l'utiliser
        parent::__construct();
    }


    // Méthode qui affiche le formulaire de connexion
    public function showLoginForm()
    {
        
    }


    // Méthode qui gère la connexion
    public function login()
    {
        
    }


    // Méthode qui gère la déconnexion
    public function logout()
    {
        
    }


    // Méthode qui affiche le formulaire l'inscription
    public function register()
    {
        
    }


    // Méthode qui gère l'inscription
    public function showRegisterForm()
    {
        
    }

}

?>