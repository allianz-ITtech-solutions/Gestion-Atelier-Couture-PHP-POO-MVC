<?php

// En PHP dans le modèle MVC, le Modèle joue le role de description des données mais aussi d'accès aux données via les requetes SQL
class CategorieModel{

    private int $id;
    private string $libelle;
    private string $tableName = "categories";

    /*
        PDO est un composant natif de PHP permettant l'accès à une base de données.
        1 - Connecter au SGBD
        2 - Choisir la base de travail (Un projet peut se connecter à plusieurs BD)
        3 - Exécuter une requete
        4 - Retourner le résultat de la requete
            - Select ===> Objet ou Array
            - Insert, Update, Delete ===> Retourne un entier ===> nbre de lignes modifiée
    */

    // L'attribut pdo nous permettra donc de nous connecter à la BD et faire des opérations.
    // NB : Toutes les classes créés par PDO sont rangés dans le package principal '\'
    private \PDO $pdo;


    // Dès qu'on crée un objet CategorieModel, automatiquement qu'il se connecte à la Base de Données
    public function __construct()
    {
        // Quand on se connecte à une base de données, on peut avoir une exception. Donc le met dans un 'try catch'
        try {
            $this->pdo = new \PDO("mysql:host=localhost:3306;dbname=l2_ism_glrsb_php_2023", "root", "");
            // die("Connexion Réussie");
        } catch (\Throwable $th) {
            // 'die' arrete le processus
            die("Erreur de Connexion");
        }
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


    // query ===> requete sans paramètres. Il retourne un statement
    // Un statement n'est rien d'autre que la table (lignes et colonnes)

    // Par défaut, 'fetchAll' nous retourne les résultats de deux manières (tableau simple et tableau associatif)
    // On doit donc lui spécifier le type de retour de ces résultats retournés
    // 'FETCH_NUM' pour dire que les données soient en numériques
    // 'FETCH_ASSOC' pour dire que les données soient en associatif
    // FETCH_CLASS pour dire que les données soient en objet suivi du nom de la classe (CategorieModel)

    // Méthode Accès aux Données
    public function findAll(): array {
        $sql = "select * from $this->tableName order by id asc";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    // prepare ===> requete avec paramètres.
    // $stmt = "select * from categories where id = $id"; ===> Interdit car expose les données (Sensible aux Injections SQL)
    // La bonne méthode est d'utiliser des jokers dans la requete (?, :nom).

    // NB : 'fetch' ne prend pas en paramètre le type de retour (fetchMode)
    public function findById(int $id):self {
        $sql = "select * from $this->tableName where id = :x"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, self::class);
        $stmt->execute(["x"=>$id]);
        return $stmt->fetch(); // Retourne un objet sous forme de CategorieModel
    }

    public function insert():int {
        // Comme l'id est auto-incrément, on le met à NULL
        $sql = "INSERT INTO `$this->tableName` (`id`, `libelle`) VALUES (NULL, :libelle)"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["libelle"=>$this->libelle]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }

    public function delete(int $id):int {
        $sql = "delete from $this->tableName where id = :x"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }

}

?>