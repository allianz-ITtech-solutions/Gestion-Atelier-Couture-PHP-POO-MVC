<?php

// On crée une constante qui va contenir l'url commune à nos vues, qu'on appelle BASE_URL
// On le définit ici car on sait que toutes les requetes passe par index
define("BASE_URL", "http://localhost:8000/");


require_once "./../controllers/StockController.php";


$stockCtrl = new StockController;

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
            $stockCtrl->listerCategories();
            break;

        case 'article':
            // Affiche la vue et liste les articles
            $stockCtrl->listerArticles();
            break;
        case 'add_categorie':
            // Enregistre une catégorie
            $stockCtrl->ajouterCategorie();
            break;
        
        default:
            # code...
            break;
    }

}
else{
    // Sinon, si elle n'existe pas, on affiche la page des categories par défaut
    $stockCtrl->listerCategories();
}


?>