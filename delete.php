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
    if ($img) {
        $dropResult = $collection->deleteOne([
            'url' => $token
        ]);
        unlink('./assets/uploads/' . $token . '.' . $img->extension);
    }
}

if ($img) { ?>
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            L'image portant le nom <strong><?= $img->name ?></strong> a bien été supprimée !
        </div>

        <div class="row">
            <div class="col-lg-6">
                <a href="/tensorflow-q/index.php" class="btn btn-block btn-success">Accueil</a>
            </div>
            <div class="col-lg-6">
                <a href="/tensorflow-q/history.php" class="btn btn-block btn-dark">Historique</a>
            </div>
        </div>
    </div>

<?php
} else { ?>

    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            Une erreur est survenue, merci de vérifier si cette image existe toujours.
        </div>

        <a href="/history.php">Aller à l'historique</a>
    </div>

<?php

}
include('includes/header.php');
