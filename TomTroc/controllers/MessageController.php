<?php

class MessageController
{
    /**
     * Affiche tous les messages qu'a reçu un utilisateur
     *
     * @param int $user_id
     * @param int $sender_id
     *
     * @return void
     */
    public function showMessagesReceivedsByUserId(int $sender_id, int $user_id) : void
    {
        
        $messageManager = new MessageManager();
        $lastMessages = $messageManager->getAllSendersByUserId($user_id);
        $allMessagesSended = $messageManager->getConversationWithSomeone($sender_id ,$user_id);
        $allMessagesReceived = $messageManager->getConversationWithSomeone($user_id ,$sender_id);

        $allMessages = array_merge($allMessagesSended, $allMessagesReceived);

        $view = new View("Mes messages");
        $view->render("mailBox", [
            'lastMessages' => $lastMessages,
            'allMessages' => $allMessages
        ]);
    }
}