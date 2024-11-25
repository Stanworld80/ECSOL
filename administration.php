<?php
session_start();

// Vérification du mot de passe pour accéder à la page d'administration
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = null;
        if (isset($_POST['password'])){
          $password = $_POST['password'];
        }
        if ($password === 'ecsoladmin') {
            $_SESSION['loggedin'] = true;
            header('Location: administration.php');
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        // Affichage du formulaire de connexion si non connecté
        echo '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Administration ECSOL</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <header>
                <h1>Connexion à l\'administration</h1>
            </header>
            <main>
                <form method="POST">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Se connecter</button>
                </form>';
        if (isset($error)) {
            echo '<p>' . $error . '</p>';
        }
        echo '</main>
        </body>
        </html>';
        exit;
    }
}

require 'db_connection.php';

// Gestion des articles de veille
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_veille') {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $contenu = $_POST['contenu'];

    $sql = "INSERT INTO articles_veille (titre, categorie, contenu) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $categorie, $contenu]);

    $message = "Article de veille ajouté avec succès!";
}

// Gestion des articles d'expérience
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_experience') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    $sql = "INSERT INTO articles_experience (titre, contenu) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $contenu]);

    $message = "Article d'expérience ajouté avec succès!";
}

// Gestion des membres
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_membre') {
    $nom = $_POST['nom'];

    $sql = "INSERT INTO membres (nom) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom]);

    $message = "Membre ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration ECSOL</title>
    <?php include 'navigation.php'; ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Administration ECSOL</h1>
    </header>
    <main>
        <?php if (isset($message)) echo '<p>' . $message . '</p>'; ?>
        <section>
            <h2>Gestion des Articles de Veille</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_veille">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>
                <label for="categorie">Catégorie :</label>
                <input type="text" id="categorie" name="categorie" required>
                <label for="contenu">Contenu :</label>
                <textarea id="contenu" name="contenu" required></textarea>
                <button type="submit">Ajouter</button>
            </form>
        </section>
        <section>
            <h2>Gestion des Articles d'Expérience</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_experience">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>
                <label for="contenu">Contenu :</label>
                <textarea id="contenu" name="contenu" required></textarea>
                <button type="submit">Ajouter</button>
            </form>
        </section>
        <section>
            <h2>Gestion des Membres</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add_membre">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <button type="submit">Ajouter</button>
            </form>
        </section>
    </main>
</body>
</html>
