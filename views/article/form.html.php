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

    <!-- Ici, on fera seulement ce qu'on doit faire (Affichage de la liste + Formulaire). -->
    <div class="container mt-5 w-50">
        <div class="card mt-2 bg-light">
            <h5 class="card-title text-center m-3">Enregistrement d'un article</h5>
            <!--
              L'attribut 'action' est utilisé dans un formulaire HTML pour spécifier où les données
              du formulaire doivent être envoyées lorsqu'il est soumis.
              L'action part toujours dans index car c'est un SPA.
            -->
            <form class="row g-3 needs-validation mx-2 mb-1 p-2" method="POST" action="<?=BASE_URL?>">
              <div class="col-md-10">
                <label for="validationCustom01" class="form-label">Libelle</label>
                <!-- Si la clé 'libelle' existe dans le tableau d'erreurs, alors il ya une erreur et on ajoute la classe is-invalid -->
                <input type="text" class="form-control <?php Helper::errorField($errors, 'libelle'); ?> " id="validationCustom01" value="" name="libelle">
                <!-- Et on applique cette classe 'invalid-feedback' sur la zone d'erreur pour que l'erreur puisse etre affiché -->
                <div class="<?php Helper::errorMessage($errors, 'libelle'); ?> ">
                  <!-- On affiche le message d'erreur -->
                  <?= $errors['libelle']??"" ?>
                </div>
              </div>
              <div class="col-md-5 mr-2">
                <label for="validationCustom02" class="form-label">Prix Achat</label>
                <input type="text" class="form-control <?php Helper::errorField($errors, 'prixAchat'); ?>" id="validationCustom02" value="" name="prixAchat">
                <div class="<?php Helper::errorMessage($errors, 'prixAchat'); ?>">
                  <?= $errors['prixAchat']??"" ?>
                </div>
              </div>
              <div class="col-md-5 mr-2">
                <label for="validationCustom02" class="form-label">Qte Stock</label>
                <input type="text" class="form-control <?php Helper::errorField($errors, 'qteStock'); ?>" id="validationCustom02" value="" name="qteStock">
                <div class=" <?php Helper::errorMessage($errors, 'qteStock'); ?>">
                  <?= $errors['qteStock']??"" ?>
                </div>
              </div>
             
              <div class="col-md-5 mr-2">
                <label for="validationCustom04" class="form-label">Categorie</label>
                <select class="form-select <?php Helper::errorField($errors, 'categorie'); ?>" id="validationCustom04" name="categorie">
                  <option selected value="">Choose...</option>
                  <!-- Récupération de la liste des categories et affichage des données dans le select -->
                  <?php foreach ($categories as $value): ?>
                    <!-- Quand on selectionne une categorie, on nous retourne son id (value="") -->
                        <option value="<?=$value->getId()?>"><?=$value->getLibelle()?></option>
                  <?php endforeach ?>
                </select>
                <div class="<?php Helper::errorMessage($errors, 'categorie'); ?>">
                  <?= $errors['categorie']??"" ?>
                </div>
              </div>
              <div class="col-md-5 mr-2">
                <label for="validationCustom04" class="form-label">Type</label>
                <select class="form-select <?php Helper::errorField($errors, 'type'); ?>" id="select-type" name="type">
                  <!-- 
                    Récupération de la liste des types d'article et affichage des données
                    dans le select.
                    Par défaut le select selectionnera 'ArticleConf'
                  -->
                  <?php foreach ($types as $value): ?>
                    <!-- Quand on selectionne une categorie, on nous retourne son id (value="") -->
                        <option value="<?=$value->getType()?>"><?=$value->getType()?></option>
                  <?php endforeach ?>
                </select>
                <div class="<?php Helper::errorMessage($errors, 'type'); ?>">
                  <?= $errors['type']??"" ?>
                </div>
              </div>
              
              <!-- Ce champ sera chargé dynamiquement avec du JS -->
              <div class="col-md-10" id="div-four">
                <label for="validationCustom02" class="form-label">Fournisseur</label>
                <input type="text" class="form-control" id="validationCustom02" value="" name="fournisseur">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <!--
                Ce champ sera chargé dynamiquement avec du JS.
                On met un display none (d-none) sur date Production pour qu'il soit caché par défaut.
              -->
              <div class="col-md-10 d-none" id="div-date">
                <label for="validationCustom02" class="form-label">Date Production</label>
                <input type="text" class="form-control" id="validationCustom02" value="" name="dateProd">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="row offset-8 mt-3">
                <div class="col-4">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
              </div>
              
              <!-- Ce champ 'hidden' contient l'information qui permet au routeur de prendre une décision -->
              <input type="hidden" name="page" value="add-article">

            </form>
        </div>
    </div>

    <!-- Comme ce js est propre à ce formulaire uniquement, pas nécessaire qu'on le mette dans du js dédié -->
    <script>
      // On récupère les éléments à manipuler
      const divDate = document.querySelector('#div-date');
      const divFour = document.querySelector('#div-four');
      const selectType = document.querySelector('#select-type');

      selectType.addEventListener('change', ()=>{
          // Si la classe existe supprime la, s'il n'existe pas ajoutes la
          divDate.classList.toggle('d-none');
          divFour.classList.toggle('d-none');
      });
    </script>