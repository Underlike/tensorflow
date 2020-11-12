<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Classifier d'image - RIL</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    </head>
    <body>

        <?php 
        if(!empty($_GET['urlImage'])) {
            echo '<img id="img" crossorigin src="./assets/uploads/' . $_GET['urlImage'] . '" style="display: none;"/>';
        }
        ?>

        <div class="container mt-4">
            <div class="card">
                <div class="card-header"><b>Analyser une image</b></div>
                <div class="card-body">
                <?php 
                if(empty($_GET['urlImage'])) { ?>
                    <form action="functions.php" method="POST" enctype="multipart/form-data">
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
                    <form action="functions.php" method="POST" enctype="multipart/form-data">
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
                <div class="card-body">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Date</th>
                                <th scope="col">Taille</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require('functions.php');
                            $images = getConnection()->find();
                            foreach ($images as $image):
                                if(!empty($image['class'])):
                                ?>
                                    <tr>
                                        <td><?= $image['name']; ?></td>
                                        <td><?= $image['date']; ?></td>
                                        <td><?= $image['size']; ?></td>
                                        <td><?= $image['class']; ?></td>
                                        <td><?= number_format($image['score'], 2, ',', ' '); ?>%</td>
                                    </tr>
                                <?php 
                                endif;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <script src="./assets/js/tensorflow.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>