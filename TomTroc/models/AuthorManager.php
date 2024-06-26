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
            return new Book($book);
        }
        return null;
    }


    /**
     * Delete  an author.
     * @param int $id : author's id.
     * @return void
     */
    public function deleteAuthor(int $id) : void
    {
        $sql = "DELETE FROM author WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}