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
        $books = $booksManager->getBooksByUserId(1);
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
     * @param int $id
     *
     * @return void
     */
    public function showMyMessagesPage($user_id, $sender_id) : void
    {
        // On vérifie que l'utilisateur est connecté.
        //$this->checkIfUserIsConnected();

        $messageManager = new MessageManager();
        $lastMessages = $messageManager->getAllSendersByUserId($sender_id);
        $allMessages = $messageManager->getAllMessageConversation($sender_id, $user_id);

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

}