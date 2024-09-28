<?php

// 1- Cette classe va contenir toutes les fonctions de Validations de Formulaires
// 2 - Elle sera réutilisable d'un projet à un autre.
// 3 - A chaque fois qu'on a une règle de validation, on le définit ici.

// Comme on veut utiliser la classe sans créer d'objet, on met les attributs et méthodes en statique
class Validator {
    
    // Ce tableau va contenir toutes les erreurs de validation
    private static array $errors = [];

    // Méthode qui vérifie si la valeur est vide et affiche l'erreur
    // Les key seront les name des input des formulaires
    public static function isEmpty($value, $key, $message="Champ Obligatoire") : void {
        if (empty($value)) {
            // Si le champ est vide, on ajoute l'erreur dans le tableau d'erreurs
            self::$errors[$key] = $message;
        }
    }

    // Méthode qui vérifie si un formulaire a été validé ou pas

    public static function validate() : bool {
        // Si count de $errors est égal à 0, alors il n'ya pas d'erreurs
        return count(self::$errors) == 0; // Retournera un Booléen
    }


    public static function getErrors()
    {
        return self::$errors;
    }

}

?>