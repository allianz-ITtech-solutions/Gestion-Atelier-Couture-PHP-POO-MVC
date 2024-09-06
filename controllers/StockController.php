<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../models/Model.php";
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
        // On affecte le libelle à un objet categorie
        $this->categorieModel->setLibelle($libelle);
        // Et on l'insère en base de données
        $this->categorieModel->insert();

        // Après avoir ajouter, on doit afficher la liste des catégories, on fait donc une redirection
        // NB : Quand on est sur une action qui n'affiche pas une vue (exple: lister), on fait une redirection
        header("location:http://localhost:8000/?page=categorie");
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