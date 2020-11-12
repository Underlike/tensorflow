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

            <li><a href="index.php?imgImage=<?= $upload->url ?>">Visualiser <?= $upload->name ?></a></li>
        <?php } ?>
    </ul>
</div>