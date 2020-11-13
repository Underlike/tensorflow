<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';
?>

<?php include('includes/dbconnect.php') ?>
<?php include('includes/header.php') ?>

<?php
if (!empty($_GET['urlImage'])) {
    echo '<img id="img" crossorigin src="./assets/uploads/' . $_GET['urlImage'] . '" style="display: none;"/>';
}
?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#" class="text-success">Accueil</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header"><b>Analyser une image</b></div>
        <div class="card-body">
            <?php
            if (empty($_GET['urlImage'])) { ?>
                <form action="functions.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="file" value="Uploader une image" required id="upload-img" name="uploaded-img" accept="image/x-png,image/jpeg" />
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-success btn-block" type="submit">Téléverser</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <form action="functions.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div id="console"></div>
                            <input type="hidden" name="image_url" id="image_url" value="<?php echo $_GET['urlImage'];  ?>">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-success btn-block" type="submit">Analyser</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
        <div class="card-footer">
            <a href="/tensorflow-q/history.php" class="btn btn-dark btn-block">Voir l'historique</a>
        </div>
    </div>   
</div>

<script src="./assets/js/tensorflow.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>