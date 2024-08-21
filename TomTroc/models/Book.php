<?php

/**
 * Entité Book, un book est défini par les champs
 * id, id_user, title, content, date_creation, date_update, views, availability
 */
 class Book extends AbstractEntity
 {
    private int $idUser;
    public Author $author;
    public User $owner;
    public int $availability;
    public string $title = "";
    public string $description = "";
    public string $image = "";
    private ?DateTime $dateCreation = null;

    /**
     * Setter pour l'id de l'utilisateur.
     * @param int $idUser
     */
    public function setOwner(User $owner) : void
    {
        $this->owner = $owner;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return User
     */
    public function getOwner() : User
    {
        return $this->owner;
    }

    /**
     * Setter pour l'auteur de l'utilisateur.
     * @param Author $author
     */
    public function setAuthor(Author $author) : void
    {
        $this->author = $author;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
     */
    public function getAuthor() : Author
    {
        return $this->author;
    }
        
    /**
     * Setter pour la disponibilité du livre.
     * @param int $idUser
     */
    public function setAvailability(int $availability) : void
    {
        $this->availability = $availability;
    }

    /**
     * Getter pour la disponibilité du livre.
     * @return int
     */
    public function getAvailability() : int
    {
        return $this->availability;
    }

    /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Getter pour l'image.
     * @return string
     */
    public function getImage() : string
    {
        return $this->image;
    }

    /**
     * Setter pour l'image.
     * @param string $image
     */
    public function setImage(string $image) : void
    {
        $this->image = $image;
    }

    /**
     * Getter pour la description.
     * Retourne les $length premiers caractères du contenu.
     * @param int $length : le nombre de caractères à retourner.
     * Si $length n'est pas défini (ou vaut -1), on retourne tout le contenu.
     * Si le contenu est plus grand que $length, on retourne les $length premiers caractères avec "..." à la fin.
     * @return string
     */
    public function getDescription(int $length = -1) : string
    {
        if ($length > 0) {
            // Ici, on utilise mb_substr et pas substr pour éviter de couper un caractère en deux (caractère multibyte comme les accents).
            $description = mb_substr($this->description, 0, $length);
            if (strlen($this->description) > $length) {
                $description .= "...";
            }
            return $description;
        }
        return $this->description;
    }

    /**
     * Setter pour le contenu.
     * @param string $content
     */
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    /**
     * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $dateCreation
     * @param string $format : le format pour la convertion de la date si elle est une string.
     * Par défaut, c'est le format de date mysql qui est utilisé.
     */
    public function setDateCreation(string|DateTime $dateCreation, string $format = 'Y-m-d H:i:s') : void
    {
        if (is_string($dateCreation)) {
            $dateCreation = DateTime::createFromFormat($format, $dateCreation);
        }
        $this->dateCreation = $dateCreation;
    }

    /**
     * Getter pour la date de création.
     * Grâce au setter, on a la garantie de récupérer un objet DateTime.
     * @return DateTime
     */
    public function getDateCreation() : DateTime
    {
        return $this->dateCreation;
    }

}