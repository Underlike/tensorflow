<?php

require './vendor/autoload.php';
include('./includes/helpers.php');


$connection = getConnection();
if (!empty($_POST)) {
    $token = $_POST['id'] ?? null;
    $class = $_POST['class'] ?? null;
    $score = $_POST['score'] ?? null;
    if (isset($token, $score, $class)) {
        $connection->updateOne(array("url" => $token), ['$set' => [
            'class' => $class,
            'score' => $score
        ]]);
    }
} else {
    $token = $_GET['id'] ?? null;

    $img = $connection->findOne([
        'url' => $token
    ]);

    if (!$img) {
        header('Location: /index.php');
        die;
    }

    include('includes/header.php'); ?>

    <div class="container mt-4">
        <div class="alert alert-primary" role="alert">
            La prédiction qui correspond le mieux est "<?= $img->class ?>" à <?= round($img->score * 100) ?>%
        </div>

    </div>
<?php
    include('includes/footer.php');
}
