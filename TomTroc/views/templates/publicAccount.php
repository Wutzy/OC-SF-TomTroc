
<?php
    /**
     *  Page Mon compte
     */
?>
<section class="myPublicAccount-section">
    <div class="myPublicAccount-container">
        <div class="user-infos">
            <div class="user-card">
                <div class="user-picture">
                    <img src="views/assets/user-images/<?= $user->img_link ?>" alt="Image de profil de l'utilisateur <?= $user->nickname ?>">
                </div>
                <div class="user-line"></div>
                <div class="user-details">
                    <div class="user-infos-nickname"><?= $user->nickname ?></div>
                    <div class="user-infos-seniority">Membre depuis <?= $seniority ?> jours</div>
                    <div class="book-owner-label">BIBLIOTHEQUE</div>
                    <div class="user-info-totalBooks">
                        <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46556 0.160154L7.2112 0.00251429C6.65202 -0.0365878 6.16701 0.385024 6.12791 0.944207L5.32192 12.4705C5.28281 13.0296 5.70442 13.5147 6.26361 13.5538L8.51796 13.7114C9.07715 13.7505 9.56215 13.3289 9.60125 12.7697L10.4072 1.24345C10.4464 0.684262 10.0247 0.199256 9.46556 0.160154ZM6.84113 0.99408C6.85269 0.828798 6.99605 0.70418 7.16133 0.715737L9.41568 0.873377C9.58096 0.884935 9.70558 1.02829 9.69403 1.19357L8.88803 12.7198C8.87647 12.8851 8.73312 13.0097 8.56783 12.9982L6.31348 12.8405C6.1482 12.829 6.02358 12.6856 6.03514 12.5203L6.84113 0.99408Z" fill="#292929"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.27482 0.0648067H1.01496C0.454414 0.0648067 0 0.519224 0 1.07977V12.6342C0 13.1947 0.454416 13.6491 1.01496 13.6491H3.27482C3.83537 13.6491 4.28979 13.1947 4.28979 12.6342V1.07977C4.28979 0.519221 3.83537 0.0648067 3.27482 0.0648067ZM0.714965 1.07977C0.714965 0.914086 0.849279 0.779771 1.01496 0.779771H3.27482C3.44051 0.779771 3.57482 0.914086 3.57482 1.07977V12.6342C3.57482 12.7999 3.44051 12.9342 3.27482 12.9342H1.01496C0.849279 12.9342 0.714965 12.7999 0.714965 12.6342V1.07977Z" fill="#292929"/>
                        </svg>
                        <?= count($books) ?> livres
                    </div>
                    <button class="btn btn-save">Ecrire un message</button>
                </div>
            </div>
        </div>
        <div class="my-books">
            <table class="myBooks-array">
                <thead>
                    <tr class="myBooks-array-header">
                        <th scope="col">
                        <a href="#">Photo</a>
                        </th>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) { ?>
                        <tr class="book-row">
                            <td class="image"><img src="views/assets/book_picture/<?= $book->image ?>" height="78px" width="78px" alt="Photo du livre <?= $book->title ?>"></th>
                            <td class="title"><?= $book->title ?></td>
                            <td class="author"><?= $book->author->name . ' ' . $book->author->forname ?></td>
                            <td class="description"><p><?= $book->description ?></p></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>