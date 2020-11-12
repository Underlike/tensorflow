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
            <div class="card-body">
                <h5 class="card-title">Détails de l'image <strong><?= $img->name ?></strong></h5>
                <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
include('includes/header.php');
