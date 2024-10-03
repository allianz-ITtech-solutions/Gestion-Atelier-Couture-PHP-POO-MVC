<?php

// Ici, on va charger toutes les classes et constantes qui sont communes à plusieurs de nos fichiers
// Ce qui va éviter la redondance et optimiser la gestion du code.

// Ca sera notre fichier de démarrage qui va nous charger tout ce qu'on a en commun
require_once "./../config/Model.php";
require_once "./../config/Validator.php";
require_once "./../config/Session.php";
require_once "./../config/Helper.php"; // On charge le helper avant le Controller comme il est utilisé dans les controllers
require_once "./../config/Controller.php";


// On crée une constante qui va contenir l'url commune à nos vues, qu'on appelle BASE_URL
// On le définit ici car on sait que toutes les requetes passe par index
define("BASE_URL", "http://localhost:8000/");

?>