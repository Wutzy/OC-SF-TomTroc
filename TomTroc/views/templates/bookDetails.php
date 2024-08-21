<?php 
    /** 
     *  Page de détails d'un livre
     */
?>
<section class="book-details">
    <div class="book-details-container">
        <div class="book-details-picture">
            <img src="<?= $book->image ?>">
        </div>
        <div class="book-details-informations">
            <h2 class="book-title"><?= Utils::format($book->title) ?></h2>
            <p class="book-author">par  <?= $book->author->forname . ' ' . $book->author->name ?></p>
            <svg width="29" height="1" viewBox="0 0 29 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 0.5L28 0.500002" stroke="#A6A6A6" stroke-linecap="round"/>
            </svg>
            <p class="book-description-label">Description</p>
            <p class="book-description"><?= Utils::format($book->description) ?></p>
            <p class="book-owner-label">Propriétaire</p>
            <a href="#" class="owner-card">
                <img src="<?= $book->image ?>" alt="">
                <p class="owner-nickname">
                    <?= Utils::format($book->owner->nickname) ?>
                </p>                     
            </a>
            <div>
                <button class="btn-send">Envoyer un message</button>
            </div>
        </div>
    </div>
</section>