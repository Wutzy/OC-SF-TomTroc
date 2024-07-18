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
     * @return void
     */
    public function showMyAccountPage() : void
    {
        $booksManager = new BookManager();
        $books = $booksManager->getBooksByUserId(1);

        $view = new View("Page mon compte");
        $view->render("myAccount", ['books' => $books]);
    }

}