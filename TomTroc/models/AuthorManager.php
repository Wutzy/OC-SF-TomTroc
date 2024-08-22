<?php

/**
 * Classe qui gère les Books.
 */
class AuthorManager extends AbstractEntityManager
{

    /**
     * Check if author exist by using name et forname
     * @param string $firstname
     * @param string $lastname
     *
     */
    public function getAuthorIfExist($firstname, $lastname)
    {
        $sql = "SELECT  * FROM author WHERE name = :name AND forname = :forname ";
        $result = $this->db->query($sql, ['name' => $firstname, 'forname' => $lastname]);
        $author = $result->fetch();
        if ($author) {
            $selectedAuthor = new Author($author);

            return $selectedAuthor;
        }
        return null;
    }

    /**
     * Ajoute un auteur.,
     *
     * @param string $firstname : nom de l'auteur à ajouter.
     * @param string $lastname : prenom de l'auteur à ajouter.
     *
     * @return void
     */
    public function addAuthor($firstname, $lastname) : void
    {
        $sql = "INSERT INTO author (name, forname) VALUES (:name, :forname)";
        $this->db->query($sql, [
            'name' => $firstname,
            'forname' => $lastname
        ]);
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