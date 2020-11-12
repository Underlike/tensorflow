<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';
include('includes/dbconnect.php');
include('includes/header.php');


$uploads = $collection->find();

?>

<div class="container mt-4">
    <?php foreach ($uploads as $upload) { ?>
        <div class="card mb-3" style="width: 18rem;">
            <img src="./uploads/<?= $upload->url ?>.<?= $upload->extension ?>" class="card-img-top" alt="<?= $upload->name ?>">
            <div class="card-body">
                <a href="/delete.php?id=<?= $upload->url ?>" class="btn btn-primary">Supprimer</a>
            </div>
        </div>
    <?php } ?>
</div>