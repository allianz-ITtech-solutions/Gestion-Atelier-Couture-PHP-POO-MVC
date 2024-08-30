<?php

class ArticleModel{

    protected int $id;
    protected string $libelle;
    protected float $prix;
    protected int $qteStock;

    // En PHP, les énumérations ne sont pas évolués. On le crée donc en string notre énumération type
    protected string $type;
    
}

?>