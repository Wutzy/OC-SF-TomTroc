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
            <a href="index.php"><img src="views/assets/logo.svg" alt="logo TomTroc" height="51" width="155"></a>
            <div class="menu">
                <div class="menu-left-side">
                    <a href="index.php">Accueil</a>
                    <a href="index.php?action=ourBooks">Nos livres à l'échange</a>
                </div>
                <div class="menu-right-side">
                    <?php
                        // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion :
                        if (isset($_SESSION['user'])) {
                            echo '
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5342 10.8594L12.3182 11.0439L12.4441 11.2822V12.7332L11.1804 12.0036L11.0119 11.8558L10.8037 11.9494C9.81713 12.3931 8.6938 12.645 7.5 12.645C3.50458 12.645 0.355 9.84779 0.355 6.5C0.355 3.15221 3.50458 0.355 7.5 0.355C11.4954 0.355 14.645 3.15221 14.645 6.5C14.645 8.19467 13.8458 9.73885 12.5342 10.8594ZM11.1765 12.0014C11.1765 12.0014 11.1766 12.0014 11.1766 12.0014L11.1765 12.0014L11.1765 12.0014Z" stroke="#292929" stroke-width="0.71"/>
                            </svg>
                            <a href="index.php?action=myMessages&sender_id=0" class="messagerieMenu">Messagerie</a>
                            <span class="count-new-messages">1</span>
                            <a href="index.php?action=myAccount">Mon compte</a>
                            <a href="index.php?action=disconnectUser">Déconnexion</a>
                            ';
                        } else {
                            echo '<a href="index.php?action=showLogInPage">Connexion</a>';
                        }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <ul>
            <li>Politique de confidentialité</li>
            <li>Mentions légales</li>
            <li>Tom Troc ©</li>
            <li>
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.0651287 4.50202C0.0976931 4.21437 0.113975 3.81546 0.113975 3.30528C0.113975 2.33378 0.0759835 1.23202 0 0C1.05834 0.0325644 2.87652 0.0488465 5.45453 0.0488465C8.02169 0.0488465 9.83172 0.0325644 10.8846 0C10.8087 1.23202 10.7707 2.33378 10.7707 3.30528C10.7707 3.81546 10.7869 4.21437 10.8195 4.50202H10.4369C10.0732 3.04205 9.60106 1.99185 9.02033 1.35142C8.44502 0.705561 7.82359 0.382631 7.15602 0.382631H7.13974V9.92399C7.13974 10.3907 7.18587 10.73 7.27813 10.9416C7.37583 11.1533 7.5495 11.2944 7.79916 11.365C8.04882 11.4355 8.44502 11.4708 8.98776 11.4708V11.8046C7.42467 11.772 6.20622 11.7557 5.33241 11.7557C4.54544 11.7557 3.40298 11.772 1.90501 11.8046V11.4708C2.44775 11.4708 2.84395 11.4355 3.09361 11.365C3.34327 11.2944 3.51424 11.1533 3.6065 10.9416C3.7042 10.73 3.75304 10.3907 3.75304 9.92399V0.382631H3.73676C3.05834 0.382631 2.43147 0.702847 1.85617 1.34328C1.28629 1.97828 0.816823 3.0312 0.44776 4.50202H0.0651287Z" fill="#00AC66"/>
                <path d="M11.1804 10.0596C11.2129 9.77199 11.2292 9.37307 11.2292 8.8629C11.2292 7.8914 11.1912 6.78964 11.1152 5.55762C12.1736 5.59018 13.9918 5.60646 16.5698 5.60646C19.1369 5.60646 20.947 5.59018 21.9999 5.55762C21.9239 6.78964 21.8859 7.8914 21.8859 8.8629C21.8859 9.37307 21.9022 9.77199 21.9347 10.0596H21.5521C21.1885 8.59967 20.7163 7.54947 20.1356 6.90904C19.5603 6.26318 18.9388 5.94025 18.2713 5.94025H18.255V15.4816C18.255 15.9484 18.3011 16.2876 18.3934 16.4992C18.4911 16.7109 18.6647 16.852 18.9144 16.9226C19.1641 16.9931 19.5603 17.0284 20.103 17.0284V17.3622C18.5399 17.3296 17.3215 17.3134 16.4476 17.3134C15.6607 17.3134 14.5182 17.3296 13.0202 17.3622V17.0284C13.563 17.0284 13.9592 16.9931 14.2088 16.9226C14.4585 16.852 14.6295 16.7109 14.7217 16.4992C14.8194 16.2876 14.8683 15.9484 14.8683 15.4816V5.94025H14.852C14.1736 5.94025 13.5467 6.26046 12.9714 6.9009C12.4015 7.5359 11.9321 8.58882 11.563 10.0596H11.1804Z" fill="#00AC66"/>
                </svg>
            </li>
        </ul>
    </footer>
</div>


</body>
</html>