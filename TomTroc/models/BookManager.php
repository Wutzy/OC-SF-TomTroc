<?php

/**
 * Classe qui gère les Books.
 */
class BookManager extends AbstractEntityManager
{

    /**
     * Récupère tous les books.
     * @param bool $limited
     * @return array : un tableau d'objets Book.
     *
     */
    public function getAllBooks(bool $limited = false) : array
    {
        $sql = "SELECT * FROM book";
        if ($limited) {
            $sql .= " LIMIT 4";
        }

        $result = $this->db->query($sql);
        $books = [];
        while ($book = $result->fetch()) {
            $author = self::getAuthorByBookId($book['id']);
            $owner = self::getOwnerByBookId($book['id']);
            $newBook = new Book($book);
            $newBook->author = $author;
            $newBook->owner = $owner;

            array_push($books, $newBook);
        }

        return $books;
    }

    /**
     * Récupère tous les books qui contiennent dans leur
     * titre la chaine de caractère recherchée
     *
     *
     * @return array : un tableau d'objets Book.
     */
    public function getBooks($keyword = null) : array
    {
        $sql = "SELECT * FROM book WHERE title like CONCAT('%', :keyword, '%')";
        $result = $this->db->query($sql, ['keyword' => $keyword]);
        $books = [];

        while ($book = $result->fetch()) {
            $author = self::getAuthorByBookId($book['id']);
            $owner = self::getOwnerByBookId($book['id']);
            $newBook = new Book($book);
            $newBook->author = $author;
            $newBook->owner = $owner;

            array_push($books, $newBook);
        }

        return $books;
    }

    /**
     * Récupère un book par son id.
     * @param int $id : l'id du book.
     * @return Book|null : un objet Book ou null si le book n'existe pas.
     */
    public function getBookById(int $id) : ?Book
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            $author = self::getAuthorByBookId($book['id']);
            $owner = self::getOwnerByBookId($book['id']);
            $selectedBook = new Book($book);
            $selectedBook->author = $author;
            $selectedBook->owner = $owner;

            return $selectedBook;
        }
        return null;
    }

    /**
     * Récupère tous les books ordonnés par une colone (titre ou date de création)
     * @param int: id's book
     * @return Author|null : un objet Author ou null si l'author n'existe pas.
     */
    public function getAuthorByBookId(int $id) : ?Author
    {
        $sql = "SELECT name, forname FROM author LEFT JOIN book ON author.id = book.author_id WHERE book.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $author = $result->fetch();
        if ($author) {
            return new Author($author);
        }
        return null;
    }

    public function getBooksByUserId(int $id) : array
    {
        $sql = "SELECT * FROM book WHERE book.owner_id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $books = [];
        while ($book = $result->fetch()) {
            $author = self::getAuthorByBookId($book['author_id']);
            $newBook = new Book($book);
            $newBook->author = $author;

            array_push($books, $newBook);
        }

        return $books;
    }


    /**
     * Récupère le propriétaire d'un livre à partir de son id
     * @param int $id_book: id's book
     * @return User|null : un objet User ou null si le propriétaire n'existe pas.
     */
    public function getOwnerByBookId(int $id_book) : ?User
    {
        $sql = "SELECT u.* FROM user u LEFT JOIN book b ON u.id = b.owner_id WHERE b.id = :id_book";
        $result = $this->db->query($sql, ['id_book' => $id_book]);
        $owner = $result->fetch();

        if ($owner) {
            return new User($owner);
        }
        return null;
    }

    /**
     * Ajoute ou modifie un book.
     * On sait si le book est un nouveau book car son id sera -1.
     * @param Book $book : le book à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateBook(Book $book) : void
    {
        if ($book->getId() == -1) {
            $this->addBook($book);
        } else {
            $this->updateBook($book);
        }
    }

    /**
     * Ajoute un book.
     * @param Book $book : le book à ajouter.
     * @return void
     */
    public function addBook(Book $book) : void
    {
        $sql = "INSERT INTO book (id_user, title, description, date_creation, image) VALUES (:id_user, :title, :description, NOW(), :image)";
        $this->db->query($sql, [
            'id_user' => $book->getIdUser(),
            'title' => $book->getTitle(),
            'description' => $book->getDescription(),
            'image' => $book->getImage(),
        ]);
    }

    /**
     * Modifie un Book.
     * @param Book $book : book à modifier.
     * @return void
     */
    public function updateBook(Book $book) : void
    {
        $sql = "UPDATE book SET title = :title, description = :description, image = :image, author_id = :author_id, availability = :availability WHERE id = :id";
        $this->db->query($sql, [
            'title' => $book->title,
            'description' => $book->description,
            'image' => $book->image,
            'author_id' => $book->author->getId(),
            'availability' => $book->availability,
            'id' => $book->getId(),
        ]);
    }

    /**
     * Supprime  book.
     * @param int $id : l'id du book à supprimer.
     * @return void
     */
    public function deleteBook(int $id) : void
    {
        $sql = "DELETE FROM book WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}