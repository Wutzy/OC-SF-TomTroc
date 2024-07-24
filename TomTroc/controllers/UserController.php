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
            $view = new View("Page mon compte");
            $view->render("myAccount", ['books' => $books]);
        } else {
            $view = new View("Page publique mon compte");
            $view->render("myPublicAccount", ['books' => $books]);
        }

    }

}