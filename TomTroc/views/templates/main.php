<?php
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.
 *
 * Les variables qui doivent impérativement être définie sont :
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page.
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Messagerie</a>
            <a href="index.php?action=apropos">Mon compte</a>
            <a href="index.php?action=monitoring">Connexion</a>
            <?php
                // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion :
                if (isset($_SESSION['user'])) {
                    echo '<a href="index.php?action=disconnectUser">Déconnexion</a>';
                }
                ?>
        </nav>
        <h1>Tom Troc</h1>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <p>Copyright © Tom Troc 2024 - Openclassrooms - <a href="index.php?action=admin">Admin</a>
    </footer>

</body>
</html>