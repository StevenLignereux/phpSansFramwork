<?php

include('../functions.php');

$pdo = pdo();

if (file_exists(SQLITE_DATABASE_PATH)) {
    unlink(SQLITE_DATABASE_PATH);
}

$query = $pdo->prepare('
        CREATE TABLE posts (
            id INTEGER PRIMARY KEY,
            title VARVHAR(255) NOT NULL,
            body TEXT NOT NULL
        )    
    ');

$query->execute();