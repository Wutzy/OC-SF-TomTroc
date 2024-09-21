<?php

/**
 * Entité Message, un author est défini par les champs
 * id, sender_id, recipient_id, created_at, content
 */
 class Message extends AbstractEntity
 {

    //private int $sender_id;
    //public string $sender_nickname = "";
    public User $sender;
    public int $recipient_id;
    public ?DateTime $created_at;

    public string $content = "";

    /**
     * Setter pour le sender_id.
     * @param int $title
     */
    public function setSender(User $sender) : void
    {
        $this->sender = $sender;
    }

    /**
     * Getter pour le sender_id.
     * @return int
     */
    public function getSender() : ?User
    {
        return $this->sender;
    }


    /**
     * Setter pour le recipient_id.
     * @param int $title
     */
    public function setRecipientId(string $recipient_id) : void
    {
        $this->recipient_id = $recipient_id;
    }


    /**
     * Getter pour recipient_id.
     * @return int
     */
    public function getRecipientId() : int
    {
        return $this->recipient_id;
    }

    /**
     * Getter pour created_at.
     * @return DateTime
     */
    public function getCreatedAt() : DateTime
    {
        return $this->created_at;
    }

    /**
     * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $created_at
     * @param string $format : le format pour la convertion de la date si elle est une string.
     * Par défaut, c'est le format de date mysql qui est utilisé.
     */
    public function setCreatedAt(string|DateTime $created_at, string $format = 'Y-m-d H:i:s') : void
    {
        if (is_string($created_at)) {
            $created_at = DateTime::createFromFormat($format, $created_at);
        }
        $this->created_at = $created_at;
    }

    /**
     * Getter pour content.
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * Setter pour le  content.
     * @param string $content
     */
    public function setContent(string $content) : void
    {
        $this->content = $content;
    }

}