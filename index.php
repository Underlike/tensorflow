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
            echo '<img id="img" crossorigin src="./uploads/' . $_GET['urlImage'] . '" style="display: none;"/>';
        }
        ?>

        <div class="container mt-4">
            <div class="card">
                <div class="card-header">Analyser une image</div>
                <div class="card-body">
                    <form action="actions.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="file" value="Uploader une image" required id="upload-img" name="uploaded-img" accept="image/x-png,image/jpeg" />
                                <div id="console"></div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary btn-block" type="submit">Analyser</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
        
        <script src="./assets/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    </body>
</html>