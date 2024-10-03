<?php

require_once "./../config/Model.php";


// Comme on ne peut créer que des articles de vente et des articles de confection, la classe Article sera en 'abstract'
/*
    En BD, on représentera l'héritage dans le mode SINGLE_TABLE.
    SINGLE_TABLE signifie que tous les attributs des classes issues 
    de l'héritage (Classe mère et classes filles) seront regroupés dans une seule table et les 
    attributs des classes filles seront nullables.
*/
class ArticleModel extends Model{

    protected int $id;
    protected string $libelle;
    protected float $prixAchat;
    protected int $qteStock;

    // En PHP, les énumérations ne sont pas évolués. On le crée donc en string notre énumération type
    protected string $type;

    /*
        En PHP, les relations ne sont pas faites comme en JAVA avec les listes et objets,
        mais en approche Base de Données (MLD).
    */
    protected int $categorieID;

    
    
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


    public function getCategorieId()
    {
        return $this->categorieID;
    }

    
    public function setCategorieId($categorieID)
    {
        $this->categorieID = $categorieID;
    }


    // Méthode qui va récupérer les articles par type (de confection ou de vente)
    public function findAll(): array
    {
        return $this->executeSelect("select * from $this->tableName where type like :typeArt", ["typeArt"=>$this->type], true);
    }


    // Méthode qui récupère les types d'articles
    public function findTypeArticles(): array
    {
        return $this->executeSelect("select distinct type from articles");
    }


    // $data est un paramètre optionel
    // Il peut etre le forunisseur ou la date de production si il est passé
    public function insert($data=null):int {
        // Comme l'id est auto-incrément, on le met à NULL
         // Requete préparée
        $sql = "INSERT INTO `$this->tableName` VALUES (NULL, :libelle, :prixAchat, :qteStock, :type, :fournisseur, :dateProd, :categorie_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["libelle"=>$this->libelle,
                        "prixAchat"=>$this->prixAchat,
                        "qteStock"=>$this->qteStock,
                        "type"=>$this->type,
                        "fournisseur"=>$this->type == "ArticleConf" ? $data : NULL,
                        "dateProd"=>$this->type == "ArticleVente" ? $data : NULL,
                        "categorie_id"=>$this->categorieID
        ]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }

}

?>