<!-- Ce fichier sera la page de présentation des données. Notre HTML -->

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
                  <div class="card-body">
                    <h5 class="card-title">Liste des Articles</h5>
                    <div class="table-responsive table-bordered">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Prix Achat</th>
                                    <th scope="col">Qte Stock</th>
                                    <th scope="col">Fournisseur</th>
                                    <th scope="col">Date Production</th>
=                                </tr>
                            </thead>
                            <!-- Récupération de la liste des categories et affichage des données -->
                            <?php 
                            // echo "<pre>";
                            //     var_dump($articles);
                            // echo "</pre>";
                            foreach ($articles as $value): ?>
                                <tbody>
                                    <tr class="">
                                        <td scope="row"><?=$value->getId()?></td>
                                        <td scope="row"><?=$value->getLibelle()?></td>
                                        <td scope="row"><?=$value->getType()?></td>
                                        <td scope="row"><?=$value->getPrixAchat()?></td>
                                        <td scope="row"><?=$value->getQteStock()?></td>
                                        <td scope="row"><?=$value->getType()=="ArticleConf" ? $value->getFournisseur():""?></td>
                                        <td scope="row"><?=$value->getType()=="ArticleVente" ? $value->getDateProd():""?></td>
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
