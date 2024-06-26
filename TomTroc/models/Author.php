<?php

/**
 * Entité Author, un author est défini par les champs
 * id, name, forname
 */
 class Author extends AbstractEntity
 {

    public string $name = "";
    public string $forname = "";

    /**
     * Setter pour le nom.
     * @param string $title
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * Getter pour le nom.
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Getter pour prénom.
     * @return string
     */
    public function getForname() : string
    {
        return $this->forname;
    }

    /**
     * Setter pour prénom.
     * @param string $image
     */
    public function setForname(string $forname) : void
    {
        $this->forname = $forname;
    }


}