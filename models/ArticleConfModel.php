<?php

// Article de Confection hérite de Article
class ArticleConfModel extends ArticleModel{
    
    private string $fournisseur;


    public function __construct()
    {
        parent::__construct();
        // Au moment ou on crèe un article de confection, on connait son type qui est "ArticleConf"
        $this->type = 'ArticleConf';
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }


    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }


    // On a redéfini la méthode insert en lui passant le fournisseur
    public function insert($data=null):int {
        return parent::insert($this->fournisseur);
    }

}

?>