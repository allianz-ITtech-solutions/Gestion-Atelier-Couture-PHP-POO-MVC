<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../config/Model.php";
require_once "./../config/Validator.php";
require_once "./../config/Session.php";
require_once "./../models/CategorieModel.php";
require_once "./../models/ArticleModel.php";
require_once "./../models/ArticleConfModel.php";
require_once "./../models/ArticleVenteModel.php";


class StockController{
    

    // Comme categorie est utile dans plusieurs parties du code, c'est mieux de le mettre comme attribut
    // C'est une bonne pratique
    private CategorieModel $categorieModel;
    private ArticleModel $articleModel;


    // Et on instancie categorieModel et ArticleModel dans le constructeur
    public function __construct()
    {
        $this->categorieModel = new CategorieModel;
        $this->articleModel = new ArticleModel;
        // On démarre la session (une seule fois) dans le constructeur car toutes les méthodes peuvent l'utiliser
        Session::start();
    }

    
    public function listerCategories(): void {
        $categories = $this->categorieModel->findAll();
        // Puis on charge la vue des catégories (Response HTML+CSS)
        require_once "./../views/categorie/liste.html.php";
    }


    // La fonction extract() en PHP crée des variables individuelles à partir des clés d'un tableau,
    // avec les valeurs correspondantes.
    public function ajouterCategorie(): void {
        // On récupère les données saisies dans le champ
        extract($_POST); // Crée une variable nommée $libelle avec comme valeur la donnée du champ
        
        // Un tableau associatif qui contiendra les erreurs du aux exceptions de BD
        $errors = [];

        // Avant d'insérer, on valide la valeur de libelle
        Validator::isEmpty($libelle, "libelle");
        
        if (Validator::validate()) {

            // Essaie d'insérer...
            try {
                // On affecte le libelle à un objet categorie
                $this->categorieModel->setLibelle($libelle);

                // Et on l'insère en base de données
                $this->categorieModel->insert();

            } catch (\Throwable $th) {
                // Si l'insertion ne se passe pas bien et produit une exception, on ajoute au tableau l'erreur
                $errors['libelle'] = "$libelle existe deja";
            }
        }
        else {
            // Champ est vide
            $errors = Validator::getErrors();
        }
        // NB : Le tableau 'errors n'est pas disponible dans la vue des catégories, ce qui est
        //      normal vu qu'on a pas inclu la vue ici, or on en a besoin.
        //      Pour y accéder dans la liste, on va donc utiliser les variables de sessions.
        // Dès qu'on a des informations qui doivent persister d'une requete à une autre, on utilise les sessions
        Session::set("errors", $errors); // On ajoute le tableau d'erreurs dans la session

        // Après avoir ajouter, on doit afficher la liste des catégories, on fait donc une redirection
        // NB : Quand on est sur une action qui n'affiche pas une vue (exple: lister), on fait une redirection
        header("location:".BASE_URL."?page=categorie");
    }


    public function listerArticles() {
        
        $articles = $this->articleModel->findAll();

        // Puis on charge la vue des catégories (Response HTML+CSS)
        require_once "./../views/article/liste.html.php";
    }


    public function ajouterArticle() {
        
        $this->articleModel->insert();

    }


}

?>