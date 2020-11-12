<?php 

require_once('dbconnect.php');

if (isset($_POST) && count($_FILES) > 0) {
    $image = $_FILES['uploaded-img'];
    if (isset($image)) {
        $token = bin2hex(random_bytes(16));

        $availableTypes = ['image/png', 'image/jpeg'];

        // on vérifie son type
        if (in_array($image['type'], $availableTypes)) {
            $data = [
                'url' => $token,
                'name' => $image['name'],
                'size' => $image['size'],
                'date' => time()
            ];

            var_dump($data);

            $extension = 'png';
            if ($image['type'] == 'image/jpeg') {
                $extension = 'jpg';
            }
            move_uploaded_file($image['tmp_name'], './uploads/' . $token . '.' . $extension);
        }
    }
}

?>
