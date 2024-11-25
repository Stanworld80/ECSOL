<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    if ($password === 'ecsoladmin') {
        $_SESSION['loggedin'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = "Mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration ECSOL</title>
</head>
<body>
    <h1>Connexion à l'administration</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="POST">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
6. Tableau de Bord de l'Administration
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Code pour afficher et gérer les articles et les membres
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord de l'Administration</title>
</head>
<body>
    <h1>Tableau de Bord de l'Administration</h1>
    <section>
        <h2>Gestion des Articles</h2>
        <!-- Formulaire et liste des articles -->
    </section>
    <section>
        <h2>Gestion des Membres</h2>
        <!-- Formulaire et liste des membres -->
    </section>
</body>
</html>
