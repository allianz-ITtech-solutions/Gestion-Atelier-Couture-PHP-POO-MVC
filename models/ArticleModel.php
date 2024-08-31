<?php

require_once "./../models/Model.php";


// Comme on ne peut créer que des articles de vente et des articles de confection, la classe Article sera en 'abstract'
/*
    En BD, on représentera l'héritage dans le mode SINGLE_TABLE.
    SINGLE_TABLE signifie que tous les attributs des classes issues 
    de l'héritage (Classe mère et classes filles) seront regroupés dans une seule table et les 
    attributs des classes filles seront nullables.
*/
abstract class ArticleModel extends Model{

    protected int $id;
    protected string $libelle;
    protected float $prixAchat;
    protected int $qteStock;

    // En PHP, les énumérations ne sont pas évolués. On le crée donc en string notre énumération type
    protected string $type;

    
    public function __construct()
    {
        // On appelle le constructeur de Model qui elle se connecte à la BD
        parent::__construct();
        // On initialise le nom de la table à 'articles'
        $this->tableName = "articles";
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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


    public function insert():int {
        // Comme l'id est auto-incrément, on le met à NULL
        $sql = "INSERT INTO `$this->tableName` (`id`, `libelle`) VALUES (NULL, :libelle)"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["libelle"=>$this->libelle]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }

    
}

?>