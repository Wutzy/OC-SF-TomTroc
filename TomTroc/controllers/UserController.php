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
    public function showAccountPage($public = true) : void
    {
        $booksManager = new BookManager();
        $userManager = new UserManager();

        if (!$public){
            // On vérifie que l'utilisateur est connecté.
            $this->checkIfUserIsConnected();
            $books = $booksManager->getBooksByUserId($_SESSION['idUser']);
            $user = $userManager->getUserById($_SESSION['idUser']);
            $origin = new DateTimeImmutable($user->registration_date->format('Y-m-d'));
            $target = new DateTimeImmutable("now");
            $interval = $origin->diff($target);
            $view = new View("Page mon compte");
            $view->render("myAccount", ['books' => $books, 'user' => $user, 'seniority' => $interval->format("%a")]);
        } else {
            $books = $booksManager->getBooksByUserId($_GET['owner']);
            $user = $userManager->getUserById($_GET['owner']);
            $origin = new DateTimeImmutable($user->registration_date->format('Y-m-d'));
            $target = new DateTimeImmutable("now");
            $interval = $origin->diff($target);
            $view = new View("Page publique mon compte");
            $view->render("publicAccount", ['books' => $books, 'user' => $user, 'seniority' => $interval->format("%a") ]);
        }
    }

    /**
     * Affiche la page mon compte
     *
     * @param ?User $sender
     *
     * @return void
     */
    public function showMyMessagesPage($sender = null) : void
    {

        // On vérifie que l'utilisateur est connecté.
        $this->checkIfUserIsConnected();

        $view = new View("Mes messages");
        $messageManager = new MessageManager();
        $lastMessages = [];
        $allMessages = [];
        $lastMessages = $messageManager->getAllSendersByUserId();
        if(!empty($sender)){
            $allMessages = $messageManager->getConversationWithSomeone($sender->getId());
        }
        $view->render("mailBox", [
            'lastMessages' => $lastMessages,
            'allMessages' => $allMessages,
            'sender' => $sender,
        ]);
    }

        /**
     * Affiche la page mon compte
     *
     *
     * @return void
     */
    public function showMyEmptyMessagesPage() : void
    {

        // On vérifie que l'utilisateur est connecté.
        $this->checkIfUserIsConnected();

        $view = new View("Mes messages");
        $lastMessages = [];
        $allMessages = [];

        $view->render("mailBox", [
            'lastMessages' => $lastMessages,
            'allMessages' => $allMessages,
            'sender' => $sender
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
            throw new Exception("Identifiants incorrects.");
        }

        // On vérifie que le mot de passe est correct.
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Identifiants incorrects.");
        }

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        // On redirige vers la page d'administration.
        Utils::redirect("home");
    }

    /**
     * Ajout et modification d'un user.
     * On sait si un user est ajouté car l'id vaut -1.
     * @return void
     */
    public function updateUser() : void
    {
        // On récupère les données du formulaire.
        $id = Utils::request("id");
        $nickname = Utils::request("nickname");
        $login = Utils::request("login");
        $img_link = empty(Utils::request("user-image")) ? Utils::request("current-user-image") : Utils::request("user-image");
        $password = Utils::request("password");
        if ($password !== "password"){
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        // On vérifie que les données sont valides.
        if (empty($nickname) || empty($login) || empty($password) || empty($img_link)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // On créé l'objet User.
        $user = new User([
            'id' => $id,
            'nickname' => $nickname,
            'login' => $login,
            'password' => $password,
            'img_link' => $img_link
        ]);

        // On ajoute le livre.
        $userManager = new UserManager();
        $userManager->updateUser($user);

        // On redirige vers la page d'administration.
        Utils::redirect("myAccount", []);
    }

    /**
     * Ajoute un utilisateur
     * @return void
     */
    public function addUser() : void
    {
        // On récupère les données du formulaire.
        $nickname = Utils::request("nickname");
        $login = Utils::request("login");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($login | $nickname | $password)) {
            return;
        }

        // On créé l'objet User.
        $userManager = new UserManager();
        $user = new User([
            'nickname' => $nickname,
            'login' => $login,
            'password' => $password,
        ]);

        // On ajoute l'utilisateur.
        $userManager = new UserManager();
        $userManager->addUser($user);

        // On redirige vers la page de connexion.
        Utils::redirect("showLogInPage");
    }

    /**
     * Ajoute un message
     * @return void
     */
    public function addMessage() : void
    {
        // On récupère les données du formulaire.
        $content = Utils::request("content");
        $id = Utils::request("id");
        $recipient_id = Utils::request("recipient_id");

        // On vérifie que les données sont valides.
        if (empty($content)) {
            return;
        }

        // On créé l'objet Message.
        $userManager = new UserManager();
        $message = new Message([
            'content' => $content,
            'sender' => $userManager->getUserById($_SESSION['idUser']),
            'recipient_id' => $recipient_id,
        ]);

        // On ajoute le message.
        $messageManager = new MessageManager();
        $messageManager->addMessage($message);

        // On redirige vers la page d'administration.
        Utils::redirect("home", ['action' => 'myMessages', 'sender_id' => $recipient_id]);
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