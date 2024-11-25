<?php
require 'db_connection.php';

// Récupération des articles de veille depuis la base de données
$sql = "SELECT titre, contenu FROM articles_veille";
$stmt = $pdo->query($sql);
$articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veille technologique - ECSOL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Veille technologique</h1>
        <?php include 'navigation.php'; ?>
    </header>
    <main>
        <section>
            <h2>Nos Articles de Veille</h2>
            <?php foreach ($articles as $article): ?>
                <article>
                    <h3><?php echo htmlspecialchars($article['titre']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($article['contenu'])); ?></p>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>Contactez-nous à <a href="mailto:ecsol@yopmail.com">ecsol@yopmail.com</a></p>
    </footer>
</body>
</html>
