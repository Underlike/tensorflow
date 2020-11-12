<?php 

require 'vendor/autoload.php';

$client = new MongoDB\Client('mongodb://127.0.0.1:27017/?readPreference=primary&appname=MongoDB%20Compass&ssl=false');
$db = $client->tensorflow;
$collection = $db->tensorflow;

if (isset($_POST) && count($_FILES) > 0) {

    $image = $_FILES['uploaded-img'];

    if (isset($image)) {

        $token = bin2hex(random_bytes(16));

        $availableTypes = ['image/png', 'image/jpeg'];

        if (in_array($image['type'], $availableTypes)) {

            $extension = 'png';

            if ($image['type'] == 'image/jpeg') {

                $extension = 'jpg';

            }
            $data = [
                'url' => $token,
                'name' => $image['name'],
                'size' => $image['size'],
                'date' => time(),
                'extension' => $extension
            ];

            $collection->insertOne($data);


            move_uploaded_file($image['tmp_name'], './uploads/' . $token . '.' . $extension);

        }
    }

    header('Location: index.php?urlImage='. $token . '.' . $extension);
}

if($_POST['score'] && $_POST['class'] && $_POST['image_url']) {

    $name = explode(".", $_POST['image_url']);

    $collection->updateOne(array("url" => $name[0]), [ '$set' =>
        ['class' => $_POST['class'],
        'score' => $_POST['score']]
    ]);

    header('Location: index.php');
}

?>


