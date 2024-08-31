<?php


require_once "./../models/Model.php";


// En PHP dans le modèle MVC, le Modèle joue le role de description des données mais aussi d'accès aux données via les requetes SQL
class CategorieModel extends Model{

    private int $id;
    private string $libelle;


    public function __construct()
    {
        // On appelle le constructeur de Model qui elle se connecte à la BD
        parent::__construct();
        // On initialise le nom de la table à 'categories'
        $this->tableName = "categories";
    }
    
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


    public function insert():int {
        // Comme l'id est auto-incrément, on le met à NULL
        $sql = "INSERT INTO `$this->tableName` (`id`, `libelle`) VALUES (NULL, :libelle)"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["libelle"=>$this->libelle]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }


}

?>