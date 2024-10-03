
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

        <!-- 
            Pour charger du CSS, du JS, etc..., on doit toujours le faire en incluant BASE_URL.

            Sauf qu'on a un problème :

            1 - Le serveur est lancé actuellement sur 'localhost:8000' dont la valeur à
                charger est 'index.php'.

            2 - Or, vu que notre serveur démarre sur index.php, si on tente de charger notre
                fichier CSS, on aura une erreur; ce qui est logique.

            3 - Donc pour régler le problème, on ne doit plus démarrer sur notre serveur sur 'index.php',
                mais plutot sur le dossier public. Ainsi, on aura la possibilité de naviguer
                entre les sous-dossiers du dossier 'public' lorsqu'on aura besoin de charger quelque chose.

            4 - Ainsi la commande pour lancer le serveur sur le dossier 'public' sera :
                'php - S localhost:8000 -t public'.

            5 - Automatiquement, la si public contient le fichier 'index.php', le fichier sera exécuté.
                Et l'avantage sera qu'on ne sera plus pointé que sur 'index.php'.
        -->

        <!-- Comme localhost représente 'public', on peut faire ceci : sachant que BASE_URL c'est public -->
        <link rel="stylesheet" href="<?=BASE_URL?>css/style.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <!-- NB : C'est pas une bonne approche car on le fera autant de fois qu'il yaura de pages -->
            <?php require_once "./../views/inc/nav.html.php"; ?>
        </header>

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


