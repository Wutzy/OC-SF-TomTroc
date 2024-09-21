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

        case 'updateUser':
            $userController = new UserController();
            $userController->updateUser();
            break;

        case 'publicAccount':
            $userController = new UserController();
            $userController->showAccountPage();
            break;

        case 'myAccount':
            $userController = new UserController();
            $userController->showAccountPage(false);
            break;

        case 'myMessages':
            $userController = new UserController();
            $messageManager = new MessageManager();
            // Cas où on essaye de s'envoyer un message à soi même
            if($_GET['sender_id'] == $_SESSION['idUser']) {
                $_GET['sender_id'] = 0;
            }

            if ($_GET['sender_id'] == 0) {
                // On récupère l'id du destinaire qui a envoyé le message le plus récent
                $last_message = $messageManager->getAllSendersByUserId();
                if (!empty($last_message)) {
                    $last_sender_id = $last_message[0]->sender->getId();
                    // if($last_sender_id == $_SESSION['idUser']) {
                    //     $last_message[0]->sender = $messageManager->getSenderById($last_message[0]->recipient_id);
                    //     $last_sender_id = $last_message[0]->sender->getId();
                    // }
                    $sender = $messageManager->getSenderById($last_sender_id);
                } else
                // Compte vierge
                {
                    $sender = $messageManager->getSenderById($_SESSION['idUser']);
                    //return $userController->showMyMessagesPage($sender);
                }
            } else {
                // Cas où l'utilisateur a déjà envoyé ou reçu un message
                $sender = $messageManager->getSenderById($_GET['sender_id']);
            }
            if (isset($sender)) {
                $userController->showMyMessagesPage($sender);
            }
            break;

        case 'registerUser':
            $userController = new UserController();
            $userController->addUser();
            break;

        case 'sendMessage':
            $userController = new UserController();
            $userController->addMessage();
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