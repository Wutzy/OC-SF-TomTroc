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
        <?php foreach($books as $book) { ?>
            <div class="card-book">
                <a class="info" href="index.php?action=showArticle&id=<?= $book->getId() ?>">                
                    <img src="<?= $book->getImage() ?>" alt="une image" class="last-book-img">
                    <h3><?= $book->getTitle() ?></h3>
                    <p><?= $book->getDescription(400) ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
</section>