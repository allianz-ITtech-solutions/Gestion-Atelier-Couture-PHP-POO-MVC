<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../models/CategorieModel.php";

class StockController{

    public function listerCategories() : array {
        $categories = [];
        for ($i=1; $i <= 5; $i++) { 
            $categorie = new CategorieModel();
            $categorie->setId($i);
            $categorie->setLibelle("Categorie".$i);
        }
        return $categories;
    }

}

?>