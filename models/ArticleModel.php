<?php

// Comme on ne peut créer que des articles de vente et des articles de confection, la classe Article sera en 'abstract'
abstract class ArticleModel{

    protected int $id;
    protected string $libelle;
    protected float $prixAchat;
    protected int $qteStock;

    // En PHP, les énumérations ne sont pas évolués. On le crée donc en string notre énumération type
    protected string $type;
    

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getPrixAchat()
    {
        return $this->prixAchat;
    }


    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;
    }


    public function getQteStock()
    {
        return $this->qteStock;
    }


    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType($type)
    {
        $this->type = $type;
    }
    
}

?>