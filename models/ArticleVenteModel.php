<?php

// Article de Vente hérite de Article
class ArticleVenteModel  extends ArticleModel{

    private string $dateProd;
    

    public function __construct()
    {
        $this->type = 'ArticleVente';
    }
    
    public function getDateProd()
    {
        return $this->dateProd;
    }

 
    public function setDateProd($dateProd)
    {
        $this->dateProd = $dateProd;
    }

}

?>