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
    <ul>
        <?php foreach ($uploads as $upload) { ?>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <li><a href="index.php?imgImage=<?= $upload->url ?>">Visualiser <?= $upload->name ?></a></li>
        <?php } ?>
    </ul>
</div>