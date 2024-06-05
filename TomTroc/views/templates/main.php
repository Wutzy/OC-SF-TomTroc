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
<div class="container">
    <header>
        <nav>
            <img src="views/assets/logo.svg" alt="logo TomTroc" height="51" width="155" />
            <div class="menu">
                <div class="menu-left-side">
                    <a href="#">Accueil</a>
                    <a href="#">Nos livres à l'échange</a>
                </div>
                <div class="menu-right-side">
                    <a href="#">Messagerie</a>
                    <a href="#">Mon compte</a>
                    <a href="#">Connexion</a>        
                </div>
            </div>
            
            <?php
                // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion :
                if (isset($_SESSION['user'])) {
                    echo '<a href="index.php?action=disconnectUser">Déconnexion</a>';
                }
                ?>
        </nav>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <p>Copyright © Tom Troc 2024 - Openclassrooms -
    </footer>
</div>
    

</body>
</html>