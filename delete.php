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
        $dropResult = $collection->drop([
            'url' => $token
        ]);
    }
}

if ($img) { ?>
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            L'image portant le nom <strong><?= $img->name ?></strong> a bien été supprimée !
        </div>

        <a href="/index.php">Aller à l'historique</a>
    </div>

<?php
} else { ?>

    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            Une erreur est survenue, merci de vérifier si cette image existe toujours.
        </div>

        <a href="/index.php">Aller à l'historique</a>
    </div>

<?php

}
include('includes/header.php');
