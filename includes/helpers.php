<?php

function getConnection()
{
    $client = new MongoDB\Client('mongodb://127.0.0.1:27017/?readPreference=primary&appname=MongoDB%20Compass&ssl=false');
    $database = $client->tensorflow->tensorflow;

    return $database;
}