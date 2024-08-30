<?php

require_once "./../controllers/StockController.php";

$stockCtrl = new StockController();

// Affiche la vue et liste les catégories 
$stockCtrl->listerCategories();

?>