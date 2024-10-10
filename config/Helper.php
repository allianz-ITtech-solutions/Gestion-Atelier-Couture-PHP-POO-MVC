<?php

// Cette classe est une classe avec des méthodes utilitaires
class Helper {

    // Cette méthode va nous permet d'accéder aux données d'un tableau (un dump)
    public static function dump($datas) {
        echo"<pre>";
            var_dump($datas);
        echo"</pre>";
    }

    // Cette méthode dd (die_dump) fait un dump puis arrete le processus
    public static function dd($datas) {
        self::dump($datas);
        die;
    }


    // Cette méthode vérifie si le tableau d'erreurs contient le champ passé.
    // S'il conient le champ passé, il colore le champ input en rouge.
    public static function errorField(array $error, $field) {
        if(array_key_exists($field, $error)) echo "is-invalid";
    }


    

}

?>