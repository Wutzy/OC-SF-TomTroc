<?php

/**
 * Entité Book, un book est défini par les champs
 * id, nickname, login, password
 */
 class User extends AbstractEntity
 {
    public string $nickname;
    private string $login;
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
     * @param int $idUser
     */
    public function setPassword(int $password) : void
    {
        $this->password = $password;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     * @return int
     */
    public function getPassword() : string
    {
        return $this->password;
    }
}