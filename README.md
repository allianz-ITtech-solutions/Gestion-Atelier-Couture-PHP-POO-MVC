## Ce projet est un projet de Gestion des Stocks pour une boutique de vente en ligne en POO + MVC version 2 (pas encore optimale).

> La version 1 POO+MVC est dans le repository PHP Fondamentaux.

## Table des matières
- [Inclusion avec 'require_once'](#require_once(mauvaise_approche))
- [Héritage_ArticleModel_ArticleConfModel_ArticleVenteModel](#)
- [Création_d'un_Controller](#StockController.php)
- [Ajout_des_méthodes_listerCategories_et_listerArticles_dans_le_controller](#listerCategories/listerArticles)
- [Génération_de_fausses_données_dans_le_Controller](#avec_la_boucle_for)
- [Création_des_vues_dédiées_pour_les_categories_et_les_articles](#)
- [Création_d'une_navbar_et_inclusion_dans_les_vues_categories_et_articles](#mauvaise_approche)
- [Ajout_d'un_switch_pour_gerer_l'affichage_des_pages_dynamiquement_avec_$GET](#GET[])


## Pour exécuter un projet PHP, on peut utiliser le serveur interne de PHP.
> On se pointe dans le dossier qui doit lancer le projet (Public)
> Puis on tape ceci : php -S localhost:8000 index.php