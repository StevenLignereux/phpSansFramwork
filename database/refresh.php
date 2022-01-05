<?php

require_once(__DIR__ . '/../functions.php');

if (file_exists(SQLITE_DATABASE_PATH)) {
    unlink(SQLITE_DATABASE_PATH);
}

$pdo = pdo();

$query = $pdo->prepare('
        CREATE TABLE posts (
            id INTEGER PRIMARY KEY,
            title VARVHAR(255) NOT NULL,
            body TEXT NOT NULL
        )    
    ');

$query->execute();