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
        // Validation ou Controle de saisie
        Validator::isEmpty($_POST['libelle'], 'libelle', 'Le Libelle est obligatoire');
        Validator::isEmpty($_POST['categorie'], 'categorie', 'La Categorie est obligatoire');
        Validator::isEmpty($_POST['type'], 'type', 'Le Type est obligatoire');
        Validator::isPositiveNumber($_POST['prixAchat'], 'prixAchat');
        Validator::isPositiveNumber($_POST['qteStock'], 'qteStock');
        // On vérifie si ces 3 sont valide
        if (Validator::validate()) {
            // On vérfie quel type a été selectionné pour savoir si on doit valider dateProd ou Fournisseur
            if ($_POST['type'] == 'ArticleVente') {
                // Si c'est égale à article de vente, on valide la date
                Validator::isEmpty($_POST['dateProd'], 'dateProd', 'La Date est obligatoire');
            }else{
                Validator::isEmpty($_POST['fournisseur'], 'fournisseur', 'Le Fournisseur est obligatoire');
            }

            // On valide à nouveau le formulaire après avoir saisi fournisseur ou date
            // Si on rentre ici, c'est que tout est valide
            if(Validator::validate()) {

                extract($_POST);

                // Dans le soucis d'éviter la duplication de code, on va utiliser articleModel (la classe mère)
                $this->articleModel->setLibelle($libelle);
                $this->articleModel->setCategorieId($categorie); // Quand on selectionne une categorie dans le form, on nous retourne son id (value="")
                $this->articleModel->setPrixAchat($prixAchat);
                $this->articleModel->setQteStock($qteStock);
                $this->articleModel->setType($type);
                $data = $type == 'ArticleVente' ? $dateProd : $fournisseur;
                $this->articleModel->insert($data);

                $this->redirect("article");
            }
        }

        // Si on arrive ici, c'est que le formulaire n'est pas valide
        // On stocke les erreur dans la session
        Session::set('errors', Validator::getErrors());
        $this->redirect("show-form-articles"); // Et on reste sur la page d'enregistrement articles

    }

}

?>