<?php

class UserController
{
    /**
     * Affiche la page d'identification (inscription)
     * @return void
     */
    public function showSignUpPage() : void
    {
        $view = new View("Page d'inscription");
        $view->render("signUp", []);
    }

    /**
     * Affiche la page d'identification (connexion)
     * @return void
     */
    public function showLogInPage() : void
    {
        $view = new View("Page de connexion");
        $view->render("logIn", []);
    }

    /**
     * Affiche la page mon compte
     *
     * @param bool $public
     *
     * @return void
     */
    public function showMyAccountPage($public = true) : void
    {
        $booksManager = new BookManager();
        $books = $booksManager->getBooksByUserId($_SESSION['idUser']);
        if (!$public){
            // On vérifie que l'utilisateur est connecté.
            $this->checkIfUserIsConnected();
            $view = new View("Page mon compte");
            $view->render("myAccount", ['books' => $books]);
        } else {
            $view = new View("Page publique mon compte");
            $view->render("myPublicAccount", ['books' => $books]);
        }
    }

    /**
     * Affiche la page mon compte
     *
     * @param int $sender_id
     *
     * @return void
     */
    public function showMyMessagesPage($sender_id) : void
    {
        // On vérifie que l'utilisateur est connecté.
        $this->checkIfUserIsConnected();

        $messageManager = new MessageManager();
        $lastMessages = $messageManager->getAllSendersByUserId($sender_id);
        $allMessages = $messageManager->getAllMessageConversation($sender_id);


        $view = new View("Mes messages");
        $view->render("mailBox", [
            'lastMessages' => $lastMessages,
            'allMessages' => $allMessages
        ]);
    }

    /**
     * Vérifie que l'utilisateur est connecté.
     * @return void
     */
    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['user'])) {
            Utils::redirect("showSignUpPage");
        }
    }

    /**
     * Connexion de l'utilisateur.
     * @return void
     */
    public function connectUser() : void
    {
        // On récupère les données du formulaire.
        $login = Utils::request("login");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($login) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($login);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }
        var_dump(!password_verify($password, $user->getPassword()));
        // On vérifie que le mot de passe est correct.
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect. : $hash");
        } 

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        // On redirige vers la page d'administration.
        Utils::redirect("home");
    }

    /**
     * Déconnexion de l'utilisateur.
     * @return void
     */
    public function disconnectUser() : void
    {
        // On déconnecte l'utilisateur.
        unset($_SESSION['user']);

        // On redirige vers la page d'accueil.
        Utils::redirect("home");
    }

}