<?php

// On charge tous nos éléments comme si on était dans index.php
require_once "./../models/CategorieModel.php";
require_once "./../models/ArticleModel.php";
require_once "./../models/ArticleConfModel.php";
require_once "./../models/ArticleVenteModel.php";


class StockController{

    public function listerCategories(): void {
        $categories = [];
        for ($i=1; $i <= 5; $i++) { 
            $categorie = new CategorieModel();
            $categorie->setId($i);
            $categorie->setLibelle("Categorie ".$i);
            $categories[] = $categorie;
        }

        // Puis on charge la vue des catégories (Response HTML+CSS)
        require_once "./../views/categorie/liste.html.php";
    }

    public function listerArticles() {
        
        $articles = [];
        
        for ($i=1; $i <= 10; $i++) {
            if ($i%2 == 0) {
                $article = new ArticleVenteModel;
                $article->setId($i);
                $article->setLibelle("Article Vente ".$i);
                $article->setPrixAchat($i*2000.0);
                $article->setQteStock($i*100);
                $article->setDateProd("1$i-05-2023");                
            }else{
                $article = new ArticleConfModel;
                $article->setId($i);
                $article->setLibelle("Article Confection ".$i);
                $article->setPrixAchat($i*500.0);
                $article->setQteStock($i*200);
                $article->setFournisseur("Fournisseur ".$i);
            }
            
            $articles[] = $article;
        }

        // Puis on charge la vue des catégories (Response HTML+CSS)
        require_once "./../views/article/liste.html.php";
    }


}

?>