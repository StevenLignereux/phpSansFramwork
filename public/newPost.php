<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
