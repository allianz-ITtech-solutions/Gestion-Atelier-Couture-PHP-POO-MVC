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
    public static function isEmpty($value, $key, $message="Champ Obligatoire") : bool {
        if (empty($value)) {
            // Si le champ est vide, on ajoute l'erreur dans le tableau d'erreurs
            self::$errors[$key] = $message;
            return true; // Si le champ est vide, on retourne true
        }
        return false; // Sinon on retourne false
    }


    // Méthode qui vérifie si la valeur est positive ou pas.
    public static function isPositiveNumber($value, $key, $message="Champ doit etre positif") : bool {
        // Si la valeur est n'est pas vide,
        if (!self::isEmpty($value, $key, $message)) {
            // On teste si la valeur est numérique et si elle est positive
            if (!is_numeric($value) || $value <= 0) {
                self::$errors[$key] = $message;
                return false;
            }
            return true;
        }
        return true;
    }


    // Méthode qui vérifie si la valeur saisie est bien un email ou pas
    public static function isEmail($value, $key, $message="Email Invalide") : bool {
        // Si la valeur est n'est pas vide,
        if (!self::isEmpty($value, $key, $message)) {
            // filter_vap prend la valeur et le critère de filtrage sur la valeur
            if (!filter_var("", FILTER_VALIDATE_EMAIL) == false) {
                self::$errors[$key] = $message;
            }
        }
        return true;
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