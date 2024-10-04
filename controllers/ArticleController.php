<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../models/ArticleModel.php";
require_once "./../models/ArticleConfModel.php";
require_once "./../models/ArticleVenteModel.php";
require_once "./../models/CategorieModel.php";


class ArticleController extends Controller {
    
    private ArticleConfModel $articleConfModel;
    private ArticleVenteModel $articleVenteModel;
    private CategorieModel $categorieModel;
    private ArticleModel $articleModel;


    // Et on instancie categorieModel et ArticleModel dans le constructeur
    public function __construct()
    {
        // NB : Le constructeur du parent sera toujours la première instruction de l'enfant
        // On appelle le constructeur du parent qui démarre la session (une seule fois) dans le constructeur car toutes les méthodes peuvent l'utiliser
        parent::__construct();

        $this->articleConfModel = new ArticleConfModel;
        $this->articleVenteModel = new ArticleVenteModel;
        $this->categorieModel = new CategorieModel;
        $this->articleModel = new ArticleModel;
    }


    // Méthode qui permet de lister les Articles
    public function index() {
        
        $articlesC = $this->articleConfModel->findAll();
        $articlesV = $this->articleVenteModel->findAll();

        // On doit fusionner $articlesC et $articlesV
        $articles = array_merge($articlesC, $articlesV);

        // On appelle la méthode render_view qui va charger le contenu de la liste dans notre layout
        $this->renderView("article/liste.html.php", [
            "articles"=>$articles
        ]);
    }


    // Méthode qui affiche le formulaire d'ajout d'un article
    public function showFormArticle() {
        $categories = $this->categorieModel->findAll();
        // Si, on charge les types à partir des filles, on aura que le type de la classe fille
        $types = $this->articleModel->findTypeArticles();
        $this->renderView("article/form.html.php", [
            "categories"=>$categories,
            "types"=>$types
        ]);
    }


    // Méthode qui permet d'enregistrer un article
    public function save() {
        
        $this->articleModel->insert();

    }

}

?>