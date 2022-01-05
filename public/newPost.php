<?php
    require_once('../functions.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = pdo();

        $pdo->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)')
            ->execute([
                ':title' => $_POST['title'],
                ':body' => $_POST['body']
            ]);

        header('Location: /post.php?id=' . $pdo->lastInsertId());
        die();
    }
?>

<?php htmlPartial('header') ?>

    <h1>Écrire un nouvel article</h1>

    <form method="POST">
        <p>
            <input type="text" name="title">
        </p>
        <p>
            <textarea name="body"></textarea>
        </p>
        <p>
            <button>Envoyer</button>
        </p>
    </form>

<?php htmlPartial('footer') ?>
