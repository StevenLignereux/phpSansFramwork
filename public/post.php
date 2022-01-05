<?php

    require_once('../functions.php');

    $pdo = pdo();
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([
        ':id' => $_GET['id']
    ]);
    
    $post = $query->fetch();

?>

<?php htmlPartial('header') ?>

    <h1><?= $post['title'] ?></h1>
    <p><?= $post['body'] ?></p>

<?php htmlPartial('footer') ?>