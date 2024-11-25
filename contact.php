<?php
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - ECSOL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Contactez-nous</h1>
      <?php include 'navigation.php'; ?>
    </header>
    <main>
        <section>
            <h2>Formulaire de Contact</h2>
            <form action="send_message.php" method="post">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>
    <footer>
        <p>Contactez-nous à <a href="mailto:ecsol@yopmail.com">ecsol@yopmail.com</a></p>
    </footer>
</body>
</html>
