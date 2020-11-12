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

            $data = [
                'url' => $token,
                'name' => $image['name'],
                'size' => $image['size'],
                'date' => time()
            ];

            $collection->insertOne($data);

            $extension = 'png';

            if ($image['type'] == 'image/jpeg') {

                $extension = 'jpg';

            }

            move_uploaded_file($image['tmp_name'], './uploads/' . $token . '.' . $extension);

        }
    }

    header('Location: index.php?urlImage='. $token . '.' . $extension);
}

?>


