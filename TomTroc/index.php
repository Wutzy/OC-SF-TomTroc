<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'ourBooks':
            $bookController = new BookController();
            $bookController->showBooksCollection();
            break;

        case 'showBook':
            $bookController = new BookController();
            $bookController->showBook();
            break;

        case 'showUpdateBookForm':
            $bookController = new BookController();
            $bookController->showUpdateBookForm($_GET['book_id']);
            break;

        case 'showLogInPage':
            $userController = new UserController();
            $userController->showLogInPage();
            break;

        case 'showSignUpPage':
            $userController = new UserController();
            $userController->showSignUpPage();
            break;

        case 'updateBook':
            $bookController = new BookController();
            $bookController->updateBook();
            break;

        case 'myPublicAccount':
            $userController = new UserController();
            $userController->showMyAccountPage($_GET['user_id']);
            break;

        case 'myAccount':
            $userController = new UserController();
            $userController->showMyAccountPage($_SESSION['idUser'], false);
            break;

        case 'myMessages':
            $userController = new UserController();
            $messageManager = new MessageManager();
            $sender = $messageManager->getSenderById($_GET['sender_id']);
            $userController->showMyMessagesPage($sender);
            break;

        case 'connectUser':
            $userController = new UserController();
            $userController->connectUser();
            break;

        case 'disconnectUser':
            $userController = new userController();
            $userController->disconnectUser();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}