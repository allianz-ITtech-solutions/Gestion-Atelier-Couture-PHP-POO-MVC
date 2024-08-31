<?php

// En PHP dans le modèle MVC, le Modèle joue le role de description des données mais aussi d'accès aux données via les requetes SQL
class CategorieModel{

    private int $id;
    private string $libelle;

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

    // Méthode Accès aux Données
    public function findAll(): array {
        $sql = "select * from categories";
        // Query permet de faire une requete simple. Il retourne un statement
        // Un statement n'est rien d'autre que la table (lignes et colonnes)
        $stmt = $this->pdo->query($sql);

        // Par défaut, 'fetchAll' nous retourne les résultats de deux manières (tableau simple et tableau associatif)
        // On doit donc lui spécifier le type de retour de ces résultats retournés
        // 'FETCH_NUM' pour dire que les données soient en numériques
        // 'FETCH_ASSOC' pour dire que les données soient en associatif
        // FETCH_CLASS pour dire que les données soient en objet suivi du nom de la classe (CategorieModel)
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function findById():object {
        $sql = "select * from categories";
        // Query permet d'éxécuter une requete simple (sans params)
        $obj = $this->pdo->query($sql);
        return $obj;
    }

}

?>