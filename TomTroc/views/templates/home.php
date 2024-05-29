<?php
    /**
     * Affichage de Liste des articles.
     */
?>

<div class="articleList">
    <?php foreach($books as $book) { ?>
        <article class="article">
            <h2><?= $book->getTitle() ?></h2>
            <img src="<?= $book->getImage() ?>" alt="une image">
            <p><?= $book->getDescription(400) ?></p>
            

            <div class="footer">
                <span class="info"> <?= ucfirst(Utils::convertDateToFrenchFormat($book->getDateCreation())) ?></span>
                <a class="info" href="index.php?action=showArticle&id=<?= $book->getId() ?>">Lire +</a>
            </div>
        </article>
    <?php } ?>
</div>