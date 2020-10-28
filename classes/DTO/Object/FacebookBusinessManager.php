<?php

namespace PrestaShop\Module\PrestashopFacebook\DTO;

use JsonSerializable;

class FacebookBusinessManager implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * FacebookBusinessManager constructor.
     *
     * @param string $name
     * @param string $mail
     * @param int $createdAt
     */
    public function __construct($name, $mail, $createdAt)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'mail' => $this->getMail(),
            'createDate' => $this->getCreatedAt(),
        ];
    }
}