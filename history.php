<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';
include('includes/dbconnect.php');
include('includes/header.php');


$uploads = $collection->find();

$i = 0;
?>

<div class="container mt-4">
    <h1 class="mb-4">Historique des images téléversées</h1>
    <div class="row">
        <?php foreach ($uploads as $upload) { ?>
            <div class="card mb-3 col-lg-3 mx-2" style="width: 18rem;">
                <img src="./assets/uploads/<?= $upload->url ?>.<?= $upload->extension ?>" class="card-img-top" style="max-width: 500; max-height: 500px" alt="<?= $upload->name ?>">
                <div class="card-body">
                    <a href="/view.php?id=<?= $upload->url ?>" class="btn btn-primary">Détails</a>
                    <a href="/delete.php?id=<?= $upload->url ?>" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
            <?php if ($i % 4) { ?>
            </div>
            <div class="row">
            <?php } ?>
        <?php } ?>
    </div>
</div>