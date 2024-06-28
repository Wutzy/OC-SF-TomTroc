<?php 
    /** 
     *  Page de détails d'un livre
     */
?>
<section>
<img src="<?= $book->image ?>">
    <p>titre : <?= Utils::format($book->title) ?></p>
    <p>auteur : <?= $book->author_forname . ' ' . $book->author_name ?></p>
    <p>description : <?= Utils::format($book->description) ?></p>
    <p>proprio : <?= Utils::format($book->title) ?></p>

</section>