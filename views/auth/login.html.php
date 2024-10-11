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


<div class="container mt-5 w-50">
    <div class="card mt-2 bg-light">
        <h5 class="card-title text-center m-3">Connectez-vous !</h5>
        <form class="m-2 p-2" method="POST" action="<?=BASE_URL?>">
            <div class="text-danger mb-2 text-center"> <?= $errors['error-connexion']??"" ?> </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text text-danger"> <?= $errors['login']??"" ?> </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <div id="passwordHelp" class="form-text text-danger"> <?= $errors['password']??"" ?> </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Connexion</button>

            <!-- Ce champ 'hidden' contient l'information qui permet au routeur de prendre une décision -->
            <input type="hidden" name="page" value="login">

        </form>
    </div>
</div>