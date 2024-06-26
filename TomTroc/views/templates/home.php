<?php
    /**
     * Affichage de Liste des articles.
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
<section>
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
    </div>
</section>
