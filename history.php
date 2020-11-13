<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';
include('includes/dbconnect.php');
include('includes/header.php');


$count = $collection->count();
$uploads = $collection->find();

$i = 0;
?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tensorflow-q/index.php" class="text-success">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Historique</li>
        </ol>
    </nav>
    <div class="row">
        <?php if ($count > 0) { ?>
            <?php foreach ($uploads as $upload) { ?>
            <div class="col-lg-4">
                <div class="card mb-3" style="width: 18rem;">
                    <img src="./assets/uploads/<?= $upload->url ?>.<?= $upload->extension ?>" class="card-img-top" style="max-width: 500; max-height: 500px" alt="<?= $upload->name ?>">
                    <div class="card-body">
                        <a href="/tensorflow-q/view.php?id=<?= $upload->url ?>" class="btn btn-dark btn-block mb-4">Détails</a>
                        <a href="/tensorflow-q/delete.php?id=<?= $upload->url ?>" class="btn btn-dark btn-block">Supprimer</a>
                    </div>
                </div>
            </div>
    <?php if ($i % 4) { ?>
    </div>
    <div class="row">
    <?php } ?>
<?php } ?>

<?php } else { ?>
        <div class="col-lg-12">
            <div class="alert alert-warning" role="alert">
                Il n'y a rien dans l'historique !
            </div>
        </div>
    
<?php } ?>
    </div>
</div>