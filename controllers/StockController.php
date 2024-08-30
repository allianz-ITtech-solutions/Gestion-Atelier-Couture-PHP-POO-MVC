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
            $categories[]=$categorie;
        }
        return $categories;

        // Puis on charge la vue des catégories (Response HTML+CSS)
        require_once "./../views/categorie/liste.html.php";
    }


}

?>