<!-- Ce fichier sera la page de présentation des données. Notre HTML -->

<?php

// C'est ici qu'on récupère les erreurs.

// On crée un tableau d'erreurs
$errors = [];

// On vérifie si la clé errors existe dans la session. Si oui on les met dans le tableau 'errors'
if(Session::exists("errors")) {
    $errors = Session::get("errors");
    // Après les avoir récupéré, on supprime la clé 'errors' de la Session. Une fois récupéré inutile de la garder dans la session
    Session::unset("errors");
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Gestion Atelier Couture</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <!-- NB : C'est pas une bonne approche car on le fera autant de fois qu'il yaura de pages -->
            <?php require_once "./../views/inc/nav.html.php"; ?>
        </header>
        <main>
            <div class="container mt-5">
                <div class="card mt-2">
                    <!--
                        Lorsqu'on a un seul champ dans un formulaire, il faut éviter de créer un formulaire
                        pour ca et le mettre directement dans la liste.

                        On doit donner au formulaire une method POST.
                        On doit donner au formulaire un 'action' qui signifie ou doit etre envoyé les données.
                        Chez nous les données doivent etre envoyés au niveau de index.php == http://localhost:8000

                        On doit aussi donner un 'name' au input qui représente la clé de notre requete (comme 'page')
                    -->
                    <form class="d-flex mt-2" style="margin-left:20px" method="POST" action="http://localhost:8000/">
                        <div class="col-5">
                            <div class="mb-2">
                                <label for="" class="form-label ml-1">Libelle</label>
                                <input type="text" name="libelle" id="" class="form-control" placeholder="" aria-describedby="helpId"/>
                                <small id="helpId" class="text-danger mt-1">
                                    <?= $errors['libelle']??"" ?>
                                </small>
                            </div>
                        </div>
                        <div class="col-2" style="margin-left:20px; margin-top: 30px;">
                            <button name="" id="" class="btn btn-primary" type="submit">Enregistrer</button>                            
                        </div>
                        <!--
                            Quand on clique sur le bouton enregistrer, on doit savoir quel action du controller 
                            appeler qui est ajouterCategorie().

                            Pour ca on va ajouter un champ 'input'. On doit le créer à chaque fois que nous avons un formulaire.
                            On doit lui donner comme name la clé de la request (page) et comme type hidden, car il sera un champ caché.

                            Et lui donne comme value, l'action (la méthode) à appeler qu'on va appeler 'add_categorie'.
                            En gros, on cache l'action 'add_categorie'

                            Au final on retournera deux champs:
                            'libelle' qui contient la donnée
                            'page' qui contient l'action à éxécuter (add_categorie)
                        -->
                        <input name="page" type="hidden" value="add_categorie">
                    </form>
                    
                  <div class="card-body">
                    <h5 class="card-title">Liste des Catégories</h5>
                    <div class="table-responsive table-bordered">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Libelle</th>
=                                </tr>
                            </thead>
                            <!-- Récupération de la liste des categories et affichage des données -->
                            <?php foreach ($categories as $value): ?>
                                <tbody>
                                    <tr class="">
                                        <td scope="row"><?=$value->getId()?></td>
                                        <td scope="row"><?=$value->getLibelle()?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                    </div>
                    
                  </div>
                </div>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
