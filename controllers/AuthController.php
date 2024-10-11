<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../models/UserModel.php";


// On charge tous nos éléments comme si on était dans index.php


// Controller qui gère les méthodes de connexion et authentification
class AuthController extends Controller {

    private UserModel $userModel;


    public function __construct()
    {
        // NB : Le constructeur du parent sera toujours la première instruction de l'enfant
        // On appelle le constructeur du parent qui démarre la session (une seule fois) dans le constructeur car toutes les méthodes peuvent l'utiliser
        parent::__construct();
        $this->userModel = new UserModel;
    }


    // Méthode qui affiche le formulaire de connexion
    public function showLoginForm()
    {
        // On change le layout de la page de connexion avec notre page 'connexion.layout.html.php'
        $this->layout = "connexion";
        $this->renderView("auth/login.html.php");
    }


    // Méthode qui gère la connexion
    public function login()
    {
        // Controle de saisie
        Validator::isEmail($_POST['login'], 'login');
        Validator::isEmpty($_POST['password'], 'password');
        if (Validator::validate()) {
            extract($_POST);
            // On vérifie si'utilisateur existe en BD
            $user = $this->userModel->findUserByLoginAndPassword($login, $password);

            // Si user est null, ca veut dire que l'utilisateur saisi n'existe pas en BD
            // On stocke l'erreur dans le validator
            if (!$user) {
                Validator::addError("error-connexion", "Login ou Mot de passe incorrect");
            }else{
                $this->redirect("categorie");
            }
        }
        // Si on arrive ici, c'est que le formulaire n'est pas valide
        // On stocke les erreurs du Validator dans le tableau de la session
        Session::set('errors', Validator::getErrors());
        $this->redirect("show-form-login"); // Et on reste sur la page de connexion
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