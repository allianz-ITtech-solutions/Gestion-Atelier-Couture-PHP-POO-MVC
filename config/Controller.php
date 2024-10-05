<?php

/*
    On remarque que lorsqu'on démarre la session (Session::start) dans les controllers, on a une erreur
    qui montre que la session est démarré plusieurs fois. Ce qui est un problème.

    Pour résoudre cela, nous allons créer un Controller de Base qui se chargera de démarrer la session
    et sera hérité par les autres Controllers.

    En plus de cela, toutes les méthodes et attributs communs à plusieurs Controllers seront déplacés ici.
*/

class Controller {
    
    // Comme demain on peut changer de layout, on va créer une variable contenant le nom de notre layout
    protected $layout = "base";


    public function __construct()
    {
        // On démarre la session (une seule fois) dans le constructeur car toutes les méthodes peuvent l'utiliser
        Session::start();
    }

    // NB : 1- Malgrè qu'on ait créé cette classe et fait héritage dans les autres controllers, la session
    //          est démarré deux fois du fait que chaque controller démarre la session dans le constructeur.
    //      2- En plus de cela, les controllers sont tous les deux instanciés dans le routeur ce qui 
    //          le démarre deux fois.
    //         On va donc tester d'abord dans Session, si la session est déja démarré avant de la démarrer


    // -----------------------------

    /* 
        1- Comme dans chaque controller la manière de charger nos vues sont les memes, on va créer
        une méthode qui gère ce traitement, ce qui va simplifier le code.

        2- En plus, la méthode doit prendre les données qui seront chargés dans la vue.

        NB : Comme ce ne sont pas toutes les vues qui auront des données à charger, on initialise
             le tableau $array par défaut à [].
    */

    public function renderView(string $view, array $datas=[]) {
        // On ne doit plus charger la vue comme ca mais on doit la charger dans la 
        // variable 'contentForView' qui se trouve dans le layout. On va utiliser un buffer
        ob_start(); // On aspire le contenu de la liste HTML

        // extract va faire ===> $val = tableau['key_val']
        extract($datas);
        
            require_once "./../views/$view";
        $contentForView = ob_get_clean(); // Le contenu de la vue html ci-dessus sera soufflé dans la variable
        // Comme la variable 'contentForView' a été défini dans le layout, on inclut le layout.html.
        // Automatiquement la variable sera visible dans le layout
        require_once "./../views/".$this->layout.".layout.html.php";
    }


    public function redirect(string $path) {
        header("location:".BASE_URL."?page=$path");
    }

}

?>