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
    echo '<img id="img" crossorigin src="./uploads/' . $_GET['urlImage'] . '" style="display: none;"/>';
}
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header"><b>Analyser une image</b></div>
        <div class="card-body">
            <?php
            if (empty($_GET['urlImage'])) { ?>
                <form action="actions.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <input type="file" value="Uploader une image" required id="upload-img" name="uploaded-img" accept="image/x-png,image/jpeg" />

                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary btn-block" type="submit">Téléverser</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <form action="actions.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div id="console"></div>
                            <input type="hidden" name="image_url" id="image_url" value="<?php echo $_GET['urlImage'];  ?>">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary btn-block" type="submit">Analyser</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header"><b>Liste MongoDB des images</b></div>
        <div class="card-body"></div>
    </div>
</div>
<?php include('includes/footer.php') ?>