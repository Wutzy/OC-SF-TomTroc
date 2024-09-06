<?php
    /**
     *  Page Mon compte
     */
?>
<section class="myAccount-section">
    <div class="myAccount-container">
        <div>
            <a href="#" onclick="history.back();">
                <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM9 4.5C9.27614 4.5 9.5 4.27614 9.5 4C9.5 3.72386 9.27614 3.5 9 3.5V4.5ZM1 4.5H9V3.5H1V4.5Z" fill="#A6A6A6"/>
                </svg>
                retour
            </a>
        </div>
        <h2>Modifier les informations</h2>
        <div class="user-infos">

            <div class="editBook-form">
                <form action="index.php?action=updateBook" method="post">
                    <div class="book-picture">
                        <div>Photo</div>
                        <img src="views/assets/user-images/<?= $book->image ?>" alt="">
                        <div class="edit-book-image">
                            <input type="hidden" id="current-book-image" name="current-book-image" value="<?= $book->image ?>">
                            <input type="file" id="book-image" name="book-image" placeholder="Modifier l'image">
                            <label for="file" class="">Modifier la photo</label>
                        </div>
                    </div>
                    <div class="editFormGrid registerFormGrid">
                        <label for="email">Titre</label>
                        <input type="text" name="title" id="title" value="<?= $book->title ?>" required>
                        <label for="firstname">Nom de l'auteur</label>
                        <input type="text" name="firstname" id="firstname" value="<?= $book->author->name?>" required>
                        <label for="lastname">Prenom de l'auteur</label>
                        <input type="text" name="lastname" id="lastname" value="<?= $book->author->forname ?>" required>
                        <label for="nickname">Description</label>
                        <textarea name="description" id="description" required><?= $book->description ?></textarea>
                        <label for="nickname">Disponibilité</label>
                        <select type="select" name="availability" id="availability">
                            <option value="1" <?php if ($book->availability == 1) { echo 'selected';} ?>>disponible</option>
                            <option value="0" <?php if ($book->availability == 0) { echo 'selected';} ?>>indisponible</option>
                        </select>
                        <input type="hidden" name="id" id="id" value="<?= $book->getId() ?>">
                        <input type="hidden" name="author_id" id="author_id" value="<?= $book->author->getId() ?>">
                        <button class="btn btn-save">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>