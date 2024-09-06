<?php
    /**
     * Affichage de la page "Nos livres"
     */
?>

<section class="books-collection-section grey-bg">
    <div class="our-books-container">
        <div class="books-collection-header">
            <div>
                <div class="books-collection-title">
                    <h2>Nos livres à l'échange</h2>
                </div>
                <div class="searchBar">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 16L16.3536 15.6464L16 16ZM13 13L12.6464 12.6464L12.2929 13L12.6464 13.3536L13 13ZM16.7071 16L16.3536 15.6464L16.3536 15.6464L16.7071 16ZM16.7071 15.2929L16.3536 15.6464L16.7071 15.2929ZM13.7071 12.2929L14.0607 11.9393L13.7071 11.5858L13.3536 11.9393L13.7071 12.2929ZM14.5 8C14.5 11.5899 11.5899 14.5 8 14.5V15.5C12.1421 15.5 15.5 12.1421 15.5 8H14.5ZM8 1.5C11.5899 1.5 14.5 4.41015 14.5 8H15.5C15.5 3.85786 12.1421 0.5 8 0.5V1.5ZM1.5 8C1.5 4.41015 4.41015 1.5 8 1.5V0.5C3.85786 0.5 0.5 3.85786 0.5 8H1.5ZM8 14.5C4.41015 14.5 1.5 11.5899 1.5 8H0.5C0.5 12.1421 3.85786 15.5 8 15.5V14.5ZM16.3536 15.6464L13.3536 12.6464L12.6464 13.3536L15.6464 16.3536L16.3536 15.6464ZM16.3536 15.6464L16.3536 15.6464L15.6464 16.3536C16.037 16.7441 16.6701 16.7441 17.0607 16.3536L16.3536 15.6464ZM16.3536 15.6464L16.3536 15.6464L17.0607 16.3536C17.4512 15.963 17.4512 15.3299 17.0607 14.9393L16.3536 15.6464ZM13.3536 12.6464L16.3536 15.6464L17.0607 14.9393L14.0607 11.9393L13.3536 12.6464ZM13.3536 13.3536L14.0607 12.6464L13.3536 11.9393L12.6464 12.6464L13.3536 13.3536Z" fill="#A6A6A6"/>
                    </svg>
                    <form action="index.php?action=ourBooks" method="POST">
                        <input type="text" placeholder="Rechercher un livre" name="searchBook" id="searchBook" value="">
                    </form>
                </div>
            </div>
        </div>
        <div class="books-collection">
            <?php foreach($books as $book) { ?>
                <div class="card-book">
                    <a class="info" href="index.php?action=showBook&id=<?= $book->getId() ?>">
                        <img src="<?= $book->getImage() ?>" alt="une image" class="last-book-img">
                        <div class="card-content">
                            <div class="last-books-title"><p><?= $book->getTitle() ?></p></div>
                            <div class="last-books-author"><p><?= $book->author_name . ' ' . $book->author_forname ?></p></div>
                            <div class="last-books-"><p>Vendeur</p></div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>