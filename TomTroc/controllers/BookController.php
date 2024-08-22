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

        $view = new View($book->title);
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
     * @param int $book_id
     * @return void
     */
    public function showUpdateBookForm($book_id) : void
    {
        // get book
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($book_id);

        $view = new View("Editer un livre");
        $view->render("editBook",
        [
            'book' => $book,
        ]);
    }

    /**
     * Affiche la page "à propos".
     * @return void
     */
    public function showApropos() {
        $view = new View("A propos");
        $view->render("apropos");
    }

    /**
     * Ajout et modification d'un book.
     * On sait si un book est ajouté car l'id vaut -1.
     * @return void
     */
    public function updateBook() : void
    {
        // On récupère les données du formulaire.
        $id = Utils::request("id");
        $title = Utils::request("title");
        $description = Utils::request("description");
        $image = empty(Utils::request("book-image")) ? Utils::request("current-book-image") : Utils::request("book-image");
        $firstname = Utils::request("firstname");
        $lastname = Utils::request("lastname");
        $availability = Utils::request("availability");

        // On vérifie que les données sont valides.
        if (empty($title) || empty($description) || empty($firstname) || empty($lastname)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // on vérifie si l'auteur existe, sinon on le créé
        $authorManager = new AuthorManager();
        $author = $authorManager->getAuthorIfExist($firstname, $lastname);

        if (!$author)
        {
            $authorManager->addAuthor($firstname, $lastname);
            $author = $authorManager->getAuthorIfExist($firstname, $lastname);
        }

        // On créé l'objet Book.
        $book = new Book([
            'id' => $id,
            'title' => $title,
            'image' => $image,
            'description' => $description,
            'author' => $author,
            'owner_id' => $_SESSION['idUser'],
            'availability' => $availability
        ]);
        //var_dump($book);die;
        // On ajoute le livre.
        $bookManager = new BookManager();
        $bookManager->updateBook($book);

        // On redirige vers la page d'administration.
        Utils::redirect("showUpdateBookForm", ['book_id' => $id]);
    }

}