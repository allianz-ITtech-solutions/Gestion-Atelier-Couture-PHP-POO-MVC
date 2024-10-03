    <!-- Ici, on fera seulement ce qu'on doit faire (Affichage de la liste + Formulaire). -->
    <div class="container mt-5">
        <div class="card mt-2">
            <div class="card-body">
                <!-- Le bouton 'Nouveau' -->
                <div class="row offset-10">
                    <div class="col-2">
                        <!-- NB : On part toujours de BASE_URL meme dans href. Ca sera show-form-articles -->
                        <a name="" id="" class="btn btn-info" href="<?=BASE_URL?>?page=show-form-articles" role="button">Nouveau</a>
                    </div>
                </div>
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
                            </tr>
                        </thead>
                        <!-- Récupération de la liste des categories et affichage des données -->
                        <?php foreach ($articles as $value): ?>
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
