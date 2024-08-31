<?php

require_once "./../controllers/StockController.php";

$stockCtrl = new StockController;


// On teste l'url sur la clé 'page' pour savoir sur quel lien on a cliqué
switch ($_GET['page']) {
    case 'categorie':
        // Affiche la vue et liste les catégories
        $stockCtrl->listerCategories();
        break;

    case 'article':
        // Affiche la vue et liste les articles
        $stockCtrl->listerArticles();
        break;
    
    default:
        # code...
        break;
}

?>