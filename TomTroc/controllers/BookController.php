<?php

class BookController
{
    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks(true);
        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }

    /**
     * Affiche tous les livres
     * @return void
     */
    public function showBooksCollection() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Nos livres à l'échange");
        $view->render("ourBooks", ['books' => $books]);
    }

    /**
     * Affiche le détail d'un livre.
     * @return void
     */
    public function showBook() : void
    {
        // Récupération de l'id du livre demandé.
        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View($book->getTitle());
        $view->render("bookDetails", ['book' => $book]);
    }

    /**
     * Affiche les livres d'un utilisateur
     * @return void
     */
    public function showBooksByUserId(int $user_id) : void
    {
        // Récupération de l'id du livre demandé.
        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks(true);
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View("Mon compte");
        $view->render("myAccount", ['books' => $books]);
    }


    /**
     *
     * @return void
     */
    public function showEditBook() : void
    {
        $view = new View("Editer un livre");
        $view->render("editBook");
    }

    /**
     * Affiche le formulaire d'ajout d'un article.
     * @return void
     */
    public function addArticle() : void
    {
        $view = new View("Ajouter un article");
        $view->render("addArticle");
    }

    /**
     * Affiche la page "à propos".
     * @return void
     */
    public function showApropos() {
        $view = new View("A propos");
        $view->render("apropos");
    }
}