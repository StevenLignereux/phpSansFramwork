<?php

define('SQLITE_DATABASE_PATH', __DIR__ . '/database/database.sqlite');


function pdo() {

    $pdo = new PDO('sqlite:' . SQLITE_DATABASE_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function htmlPartial($name)
{
    require( __DIR__ . "/htmlPartials/$name.php");
}