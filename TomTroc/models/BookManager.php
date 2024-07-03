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

            $author = self::getAuthorByBookId($book['author_id']);
            $newBook = new Book($book);
            $newBook->author_name = $author->name;
            $newBook->author_forname = $author->forname;

            array_push($books, $newBook);

        }

        return $books;
    }

    /**
     * Récupère tous les books ordonnés par une colone (titre ou date de création)
     * @return array : un tableau d'objets Book.
     */
    public function getBooks(string $column = 'title', string $order = 'desc') : array
    {
        $sql = "SELECT id, title, description, image, date_creation FROM book ORDER BY $column $order";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
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
            $author = self::getAuthorByBookId($book['author_id']);
            $owner = self::getOwnerByBookId($book['owner_id']);
            $selectedBook = new Book($book);
            $selectedBook->author_name = $author->name;
            $selectedBook->author_forname = $author->forname;            
            $selectedBook->owner_nickname = $owner->nickname;

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
        $sql = "SELECT name, forname FROM author LEFT JOIN book ON author.id = book.author_id WHERE author.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $author = $result->fetch();
        if ($author) {
            return new Author($author);
        }
        return null;
    }

    /**
     * Récupère le propriétaire d'un livre à partir de son id
     * @param int: id's book
     * @return User|null : un objet User ou null si le propriétaire n'existe pas.
     */
    public function getOwnerByBookId(int $id) : ?User
    {
        $sql = "SELECT nickname FROM user LEFT JOIN book ON user.id = book.owner_id WHERE user.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
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
        $sql = "UPDATE book SET title = :title, description = :description, image = :image WHERE id = :id";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'description' => $book->getDescription(),
            'image' => $book->getImage(),
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