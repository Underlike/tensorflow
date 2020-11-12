<?php 

require 'vendor/autoload.php';

$client = new MongoDB\Client('mongodb://loacalhost:27017');
$db = $client->tensorflow;


var_dump($db);

?>