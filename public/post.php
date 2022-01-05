<?php

    require_once('../functions.php');

    $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
    if ($id === false) {
        http_response_code(404);
        htmlPartial('404');
        die();
    }

    $pdo = pdo();
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([$id]);
    
    $post = $query->fetch();

    if ($post === false) {
        http_response_code(404);
        htmlPartial('404');
        die();
    }

?>

<?php htmlPartial('header') ?>

    <h1><?= $post['title'] ?></h1>
    <p><?= $post['body'] ?></p>

<?php htmlPartial('footer') ?>