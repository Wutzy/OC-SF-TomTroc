<?php

/**
 * Entité Book, un book est défini par les champs
 * id, nickname, login, password
 */
 class User extends AbstractEntity
 {
    public string $nickname;
    public ?string $img_link;
    public string $login;
    private string $password;
    public Datetime $registration_date;

    /**
     * Setter pour le pseudo de l'utilisateur.
     * @param int $idUser
     */
    public function setNickname(string $nickname) : void
    {
        $this->nickname = $nickname;
    }

    /**
     * Getter pour le pseudo de l'utilisateur.
     * @return int
     */
    public function getNickname() : string
    {
        return $this->nickname;
    }

    /**
     * Setter pour l'image de l'utilisateur.
     * @param int $idUser
     */
    public function setImgLink(string $img_link) : void
    {
        $this->img_link = $img_link;
    }

    /**
     * Getter pour la date d'inscription de l'utilisateur.
     * @return int
     */
    public function getRegistrationDate() : Datetime
    {
        return $this->registration_date;
    }

        /**
     * Setter pour la date d'inscription de l'utilisateur.
     * @param int $registration_date
     */
    public function setRegistrationDate(string|DateTime $registration_date, string $format = 'Y-m-d H:i:s') : void
    {
        if (is_string($registration_date)) {
            $registration_date = DateTime::createFromFormat($format, $registration_date);
        }
        $this->registration_date = $registration_date;
    }

    /**
     * Getter pour l'image de l'utilisateur.
     * @return int
     */
    public function getImgLink() : string
    {
        return $this->img_link;
    }

    /**
     * Setter pour le login de l'utilisateur.
     * @param int $idUser
     */
    public function setLogin(string $login) : void
    {
        $this->login = $login;
    }

    /**
     * Getter pour le login de l'utilisateur..
     * @return int
     */
    public function getLogin() : string
    {
        return $this->login;
    }

    /**
     * Setter pour le mot de passe de l'utilisateur.
     * @param string $password
     */
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }
}