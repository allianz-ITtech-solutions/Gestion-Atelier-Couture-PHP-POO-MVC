
<!--
    On remarque qu'entre chacune de nos vues, on a du code qui se répète dont la barre de navigation et
    la structure de base de nos pages.

    Pour éviter de la duplication de code entre nos page (navbar et structure de base) et optimiser
    notre code, nous allons créer un layout qui sera notre code HTML de base qui sera hérité par nos
    autre vues.

    Il aura le code commun entre nos vues et on pourra le réutiliser dans nos autres vues.
-->

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

        <main>
            <!-- content here -->

            <!--
                Cette partie main est la partie qui peut changer d'une vue à une autre.
                On va donc la représenter par une variable 'contentForView' qui affichera le contenu de nos vues.
            -->
            <?php echo $contentForView?>
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


