<?php
    require_once('../functions.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];

        if (empty($_POST['title'])) {
            $errors['title'] = 'Le titre est obligatoire';
        }

        if (empty($_POST['body'])) {
            $errors['body'] = 'Le contenu est obligatoire';
        }

        if (empty($errors)) {
            $pdo = pdo();

            $pdo->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)')
                ->execute([
                    ':title' => $_POST['title'],
                    ':body' => $_POST['body']
                ]);
    
            header('Location: /post.php?id=' . $pdo->lastInsertId());
            die();
        }
    }
?>

<?php htmlPartial('header') ?>

    <h1>Écrire un nouvel article</h1>

    <form method="POST">
        <p>
            <?php if (isset($errors['title'])) : ?>
                <span class="error"><?= $errors['title'] ?></span>
            <?php endif ?>
            <input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>">
        </p>
        <p>
            <?php if (isset($errors['body'])) : ?>
                <span class="error"><?= $errors['body'] ?></span>
            <?php endif ?>
            <textarea name="body"><?= $_POST['body'] ?? '' ?></textarea>
        </p>
        <p>
            <button>Envoyer</button>
        </p>
    </form>

<?php htmlPartial('footer') ?>
