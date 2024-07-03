<?php

class UserController
{
    /**
     * Affiche la page d'identification.
     * @return void
     */
    public function showLoginPage() : void
    {
        $view = new View("Page de connexion");
        $view->render("login", []);
    }

}