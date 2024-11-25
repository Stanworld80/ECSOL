<?php
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECSOL - Experimental Computer Science Online Laboratory</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>ECSOL - Experimental Computer Science Online Laboratory</h1>
          <?php include 'navigation.php'; ?>
    </header>
    <main>
<?php 
echo "_ENV:";
echo '<pre>'; print_r($_ENV); echo '</pre>';
echo "globals:";
 echo '<pre>'; print_r($GLOBALS); echo '</pre>';
?>
        <section>
            <h2>Bienvenue au laboratoire ECSOL</h2>
            <p>Le laboratoire ECSOL est dédié à la recherche en informatique expérimentale. Découvrez nos projets, notre équipe, et nos dernières découvertes.</p>
        </section>
    </main>
    <footer>
        <p>Contactez-nous à <a href="mailto:ecsol@yopmail.com">ecsol@yopmail.com</a></p>
    </footer>
</body>
</html>
