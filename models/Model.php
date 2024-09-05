<?php

/*
    Cette classe va nous permettre de factoriser le code commun (les méthodes d'accès aux données) qui 
    se répète entre plusieurs classes.

    // Comme elle ne produira pas d'objet, on la mettra en abstract
*/

class Model{

    protected string $tableName;

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
    protected \PDO $pdo;



    // Dès qu'on crée un objet d'une classe (Categorie,...), automatiquement qu'il se connecte à la Base de Données
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

    /*
        NB: Les objets retournés ne doivent pas etre du meme type que la classe mais que celles
        des classes qui appellent cette classe.
    */

    // Méthode Accès aux Données
    public function findAll(): array {
        $sql = "select * from $this->tableName order by id asc";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    // prepare ===> requete avec paramètres.
    // $stmt = "select * from categories where id = $id"; ===> Interdit car expose les données (Sensible aux Injections SQL)
    // La bonne méthode est d'utiliser des jokers dans la requete (?, :nom).

    // NB : 'fetch' ne prend pas en paramètre le type de retour (fetchMode)
    public function findById(int $id):self {
        $sql = "select * from $this->tableName where id = :x"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $stmt->execute(["x"=>$id]);
        return $stmt->fetch(); // Retourne un objet sous forme de CategorieModel
    }

    /*
        En PHP, lorsqu'une méthode la classe mère peut etre redéfinie par les classes filles,
        on utilise le mot clé 'abstract'.

        Une méthode abstract est une méthode ne possédant pas de corps, mais qui exige d'etre
        redéfini dans les classes filles.

        NB : Une méthode abstract ne peut se trouver que dans une classe abstract.
    */
    // public abstract function insert($data=null):int {
    //     // Comme l'id est auto-incrément, on le met à NULL
    //     $sql = "INSERT INTO `$this->tableName` (`id`, `libelle`) VALUES (NULL, :libelle)"; // Requete préparée
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute(["libelle"=>$this->libelle]);
    //     return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    // }

    public function delete(int $id):int {
        $sql = "delete from $this->tableName where id = :x"; // Requete préparée
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimé
    }

}

?>