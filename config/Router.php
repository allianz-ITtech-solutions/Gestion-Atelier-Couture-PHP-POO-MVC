<?php

// Router ===> Charger les Controllers et exécuter une action du controller

require_once "./../controllers/CategorieController.php";
require_once "./../controllers/ArticleController.php";
require_once "./../controllers/AuthController.php";


$catCtrl = new CategorieController;
$artCtrl = new ArticleController;
$authCtrl = new AuthController;


// Quand on fait ca, on voit les données qui ont été soumis lorsqu'on clique sur le bouton de soumission
// var_dump($_POST);


// En PHP, la fonction isset() est utilisée pour vérifier si une variable est définie et si elle est non nulle

// Vérifie si la clé 'page' existe dans l'URL (via $_GET) ou dans une requête de type POST (via $_POST)
// Si la clé est définie dans l'une des deux, le code à l'intérieur du if s'exécute.

// if (isset($_GET['page']) || isset($_POST['page'])) {

    // Cette ligne utilise l'opérateur ternaire pour attribuer à $action :
        // Soit la valeur de $_GET['page'] si elle existe.
        // Sinon, la valeur de $_POST['page'] si elle existe.
    // $action = isset($_GET['page']) ? $_GET['page'] : $_POST['page'];
// }


// $_REQUEST : C'est une superglobale qui combine les données provenant de $_GET, $_POST et $_COOKIE.
// Donc si la clé 'page' est définie via une requête GET ou POST, elle sera disponible dans $_REQUEST.
if (isset($_REQUEST['page'])) {

    switch ($_REQUEST['page']) {

        case 'categorie':
            // Affiche la vue et liste les catégories
            $catCtrl->index();
            break;

        case 'article':
            // Affiche la vue et liste les articles
            $artCtrl->index();
            break;

        // On ajoute la route qui affiche le formulaire d'ajout d'un article
        case 'show-form-articles':
            $artCtrl->showFormArticle();
            break;

        // On ajoute la route qui enregistre un article
        case 'add-article':
            $artCtrl->save();
            break;
            
        case 'add_categorie':
            // Enregistre une catégorie
            $catCtrl->save();
            break;
        
        default:
            # code...
            break;
    }

}
else{
    // Sinon, si elle n'existe pas, on affiche la page de connexion
    $authCtrl->showLoginForm();
}


?>