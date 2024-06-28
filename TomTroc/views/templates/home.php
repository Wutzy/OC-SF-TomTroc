<?php
    /**
     * Affichage de la page d'accueil
     */
?>

<section class="home-top-page">
    <div class="joinus-container">
        <div class="joinus">
            <div class="joinus-title">
                <h2>Rejoignez nos lecteurs passionnés</h2>
            </div>
            <div class="joinus-speech">
                <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture.
                    Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
                </p>
                <button class="btn-discover">Découvrir</button>
            </div>
        </div>
        <div class="img-joinus">
            <img src="https://placehold.co/404x539" alt="">
            <div>
                <p>Hamza</p>
            </div>
        </div>
    </div>
</section>
<section class="home-books-section">
    <div class="last-books-container">
        <h2>Les derniers livres ajoutés</h2>
        <div class="last-books-group">
            <?php foreach($books as $book) { ?>
                <div class="card-book">
                    <a class="info" href="index.php?action=showArticle&id=<?= $book->getId() ?>">
                        <img src="<?= $book->getImage() ?>" alt="une image" class="last-book-img">
                        <div class="card-content">
                            <div class="last-books-title"><p><?= $book->getTitle() ?></p></div>
                            <div class="last-books-author"><p><?= $book->author_name .' ' . $book->author_forname ?></p></div>
                            <div class="last-books-"><p>Vendeur</p></div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="show-books">
            <div class="btn-show-books">
                <a href="#">Voir tous les livres</a>
            </div>
        </div>
    </div>
</section>
<section class="howitworks-section">
    <div class="howitworks-container">
        <div class="howitworks-title">
            <p>Comment ça marche ?</p>
        </div>
        <div class="howitworks-description">
            <p>Echanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
        </div>
        <div class="howitworks-cards-group">
            <div class="howitworks-card">
                <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            </div>
            <div class="howitworks-card">
                <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            </div>
            <div class="howitworks-card">
                <p>Parcourez les livres disponibles chez d'autres membres.</p>
            </div>
            <div class="howitworks-card">
                <p>Proposez un échange et discutez avec d'autres passionés de lecture.</p>
            </div>
        </div>
        <div class="show-books">
            <div class="btn-light-show-books">
                <a href="#">Voir tous les livres</a>
            </div>
        </div>
    </div>
</section>
<section class="values-section grey-bg">
    <div class="banner">
        <img src="views/assets/home-books-banner.png" alt="">
    </div>
    <div class="values">
        <div class="values-title">
            Nos valeurs
        </div>
        <div class="values-speech">
            <p>
            Chez Tom Troc, nous mettons l'accent sur le partage,
            la découverte et la communauté. Nos valeurs sont ancrées
            dans notre passion pour les livres et notre désir de créer des
            liens entre les lecteurs. Nous croyons en la puissance des histoires
            pour rassembler les gens et inspirer des conversations enrichissantes.
            <p>
            Notre association a été fondée avec une conviction profonde :
            chaque livre mérite d'être lu et partagé.
            </p>
            <p>
            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs
            de se connecter, de partager leurs découvertes littéraires et d'échanger des livres
            qui attendent patiemment sur les étagères.
        </div>
        <div class="signature-speech">
            <div>
                <p>L'équipe Tom Troc</p>
            </div>
            <svg width="122" height="104" viewBox="0 0 122 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 96.2224V96.2224C2.29696 95.8216 6.2879 96.4842 7.64535 96.4785C34.2391 96.3656 77.2911 74.6923 96.4064 56.0062C109.127 40.7664 119.928 7.80529 85.8057 2.24352C65.0283 -1.1431 50.1873 26.7966 62.0601 33.1465C66.0177 35.2631 78.258 25.6112 65.0283 12.4034C51.7986 -0.804455 39.7279 0.126873 35.3463 2.24352C15.417 7.74679 2.27208 42.7137 71.8127 87.7558C96.4064 103.685 121 102.996 121 102.996" stroke="#00AC66" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>

    </div>
</section>
