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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/tensorflow-q/index.php" class="text-success">Accueil</a></li>
                <li class="breadcrumb-item"><a href="/tensorflow-q/history.php" class="text-success">Historique</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $img->name ?></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <img src="./assets/uploads/<?= $img->url ?>.<?= $img->extension ?>" class="card-img-top" id="img-preview" alt="...">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><b>Informations sur l'image</b></div>
                    <div class="card-body">
                        <p class="card-text"><strong>Nom de l'image</strong> : <?= $img->name ?></p>
                        <p class="card-text"><strong>Taille de l'image</strong> : <?= $img->size ?> octets</p>
                        <p class="card-text"><strong>Classe de l'image</strong> : <?= $img->class ?></p>
                        <p class="card-text"><strong>Score de l'image</strong> : <?= $img->score ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Ajoutée le <?= $img->date ?>
                    </div>
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
