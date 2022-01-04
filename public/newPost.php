<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $path = __DIR__ . '/../database/database.sqlite';
        $pdo = new PDO("sqlite:$path");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $pdo->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)')
            ->execute([
                ':title' => $_POST['title'],
                ':body' => $_POST['body']
            ]);

        var_dump($_POST);
        die();
    }
?>

<?php include('../header.php') ?>

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

<?php include('../footer.php') ?>
