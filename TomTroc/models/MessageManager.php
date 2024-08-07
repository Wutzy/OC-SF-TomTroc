<?php

/**
 * Classe qui gère les Messages.
 */
class MessageManager extends AbstractEntityManager
{

    /**
     * Récupère tous les messages échangés avec un utilisateur
     */
    public function getConversationWithSomeone(int $sender_id) : array
    {
        var_dump($sender_id, $_SESSION['idUser']);
        $sql = "SELECT * FROM message WHERE (message.recipient_id = :recipient_id AND message.sender_id = :sender_id) OR (message.sender_id = :recipient_id AND message.recipient_id = :sender_id) ORDER BY created_at DESC";
        $result = $this->db->query($sql,
        [
            'sender_id' => $sender_id,
            'recipient_id' => $_SESSION['idUser']
        ]);

        $messages = [];

        while ($message = $result->fetch()) {
            $sender = self::getSenderById($message['sender_id']);
            $newMessage = new Message($message);
            $newMessage->sender_nickname = $sender->nickname;

            array_push($messages, $newMessage);
        }

        return $messages;
    }

    /**
     * Récupère tous les utilisateurs ayant envoyé un message à l'utilisateur connecté
     *
     *
     */
    public function getAllSendersByUserId() : array
    {
        //$sql = "SELECT sender_id, content, created_at FROM message WHERE message.recipient_id = :id  GROUP BY sender_id ORDER BY created_at DESC";
        $sql = "SELECT m.sender_id, m.content, m.created_at FROM message m JOIN (SELECT sender_id, MAX(created_at) as date_recente FROM message GROUP BY sender_id) last_message ON m.sender_id = last_message.sender_id AND m.created_at = last_message.date_recente  WHERE m.recipient_id = :id ORDER BY m.created_at DESC";

        $result = $this->db->query($sql, ['id' => $_SESSION['idUser']]);
        $messages = [];
        while ($message = $result->fetch()) {
            $sender = self::getSenderById($message['sender_id']);
            $newMessage = new Message($message);
            $newMessage->sender_nickname = $sender->nickname;

            array_push($messages, $newMessage);
        }

        return $messages;
    }

    /**
     * Récupère tous les books ordonnés par une colone (titre ou date de création)
     * @param int: id's user
     * @return User|null : un objet User ou null si le user n'existe pas.
     */
    public function getSenderById(int $id) : ?User
    {
        $sql = "SELECT nickname FROM user WHERE user.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Affiche tous les messages d'une conversation
     *
     * @param int $sender_id
     *
     * @return array
     */
    public function getAllMessageConversation(int $sender_id) : array
    {

        $lastMessages = self::getAllSendersByUserId();
        $allMessages = self::getConversationWithSomeone($sender_id);

        var_dump($allMessages);

        return $allMessages;
    }

}