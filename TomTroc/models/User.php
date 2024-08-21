<?php

/**
 * Entité Book, un book est défini par les champs
 * id, nickname, login, password
 */
 class User extends AbstractEntity
 {
    public string $nickname;
    public string $img_link;
    public string $login;
    private string $password;

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