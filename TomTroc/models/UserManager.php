<?php

/**
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager
{
    /**
     * Récupère un user par son login.
     * @param string $login
     * @return ?User
     */
    public function getUserByLogin(string $login) : ?User
    {
        $sql = "SELECT * FROM user WHERE login = :login";
        $result = $this->db->query($sql, ['login' => $login]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Récupère un user par son id.
     * @param string $id
     * @return ?User
     */
    public function getUserById(string $id) : ?User
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

     /**
     * Ajoute ou modifie un user.
     * On sait si le user est un nouveau user car son id sera -1.
     * @param User $user : le user à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateUser(User $user) : void
    {
        if ($user->getId() == -1) {
            $this->addUser($user);
        } else {
            $this->updateUser($user);
        }
    }

    /**
     * Ajoute un user.
     * @param User $user : le user à ajouter.
     * @return void
     */
    public function addUser(User $user) : void
    {
        $sql = "INSERT INTO user (nickname, login, password, registration_date, img_link) VALUES (:nickname, :login, :password, NOW(), :img_link)";
        $hashpsw = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $this->db->query($sql, [
            'nickname' => $user->nickname,
            'login' => $user->login,
            'password' => $hashpsw,
            'img_link' => ''
        ]);
    }

    /**
     * Modifie un user.
     * @param User $user : le user à modifier.
     * @return void
     */
    public function updateUser(User $user) : void
    {
        if ($user->getPassword() !== 'password') {
            $sql = "UPDATE user SET nickname = :nickname, login = :login, password = :password, img_link = :img_link WHERE id = :id";
            $this->db->query($sql, [
                'login' => $user->login,
                'nickname' => $user->nickname,
                'password' => $user->getPassword(),
                'img_link' => $user->img_link,
                'id' => $user->getId(),
            ]);
        } else {
            $sql = "UPDATE user SET nickname = :nickname, login = :login, img_link = :img_link WHERE id = :id";
            $this->db->query($sql, [
                'login' => $user->login,
                'nickname' => $user->nickname,
                'img_link' => $user->img_link,
                'id' => $user->getId(),
            ]);
        }
    }
}