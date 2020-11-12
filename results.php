<?php

require './vendor/autoload.php';
include('includes/dbconnect.php');
include('includes/header.php');

$token = $_GET['id'] ?? null;

$img = null;
$dropResult = null;
if ($token !== null) {
    $img = $collection->findOne([
        'url' => $token
    ]);
}

if ($img) { ?>
    <div class="container mt-4">
        <div class="card">
            <input hidden id="img-token" value="<?= $img->url ?>">
            <img src="./assets/uploads/<?= $img->url ?>.<?= $img->extension ?>" class="card-img-top" id="img-preview" alt="...">
            <div class="card-body">
                <h4 class="card-title">Détails de l'image</h5>
                    <p class="card-text"><strong>Nom de l'image</strong> : <a href="./assets/uploads/<?= $img->url ?>.<?= $img->extension ?>"><?= $img->name ?></a></p>
                    <p class="card-text"><strong>Taille de l'image</strong> : <?= $img->size ?> octets</p>
                    <p class="card-text"><small class="text-muted">Ajoutée le <?= $img->date ?></small></p>
                    <hr id="analyser" />

                    <a id="btn-analyse" href="#analyser" class="btn btn-primary">Analyser</a>
                    <br/>
                    <br/>
                    <div class="alert alert-info invisible" role="alert" id="result-analyse">
                    </div>
            </div>
        </div>
    </div>
<?php
} else {
?>

    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            Une erreur est survenue, merci de vérifier si cette image existe toujours.
        </div>

        <a href="/history.php">Aller à l'historique</a>
    </div>

<?php

}
include('includes/footer.php');
