<?php

// Article de Vente hérite de Article
class ArticleVenteModel  extends ArticleModel{

    private string $dateProd;
    

    public function __construct()
    {
        parent::__construct();
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


    // On a redéfini la méthode insert en lui passant la date de production
    // NB : En redéfinissant, on doit respecter le prototype de la méthode hérité de la classe mère 
    public function insert($data=null):int {
        return parent::insert($this->dateProd);
    }

}

?>