<?php

/**
 * This file contains the RWC\SEOReport\User class.
 *
 * PHP version 7
 *
 * @author    Brian Reich <breich@reich-consulting.net>
 * @copyright 2018 Copyright (C) Reich Web Consulting
 */

namespace RWC\SEOReport;

/**
 * Class User
 * @package RWC\SEOReport
 */
class User
{
    protected $userId;
    protected $username;
    protected $password;
    protected $name;
    protected $created;
    protected $lastModified;
    protected $creator;
    protected $lastModifiedBy;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param string $name
     * @param int $created
     * @param int $creator
     * @param int $lastModified
     * @param int $lastModifiedBy
     * @param int|null $id
     */
    public function __construct(
        string $username,
        string $password,
        string $name,
        int $created,
        int $creator,
        int $lastModified,
        int $lastModifiedBy,
        ?int $id = null
    ) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setName($name);
        $this->setCreated($created);
        $this->setCreator($creator);
        $this->setLastModified($lastModified);
        $this->setLastModifiedBy($lastModifiedBy);
        $this->setId($id);
    }

    /**
     * @param int $lastModifiedBy
     */
    public function setLastModifiedBy(int $lastModifiedBy) : void
    {
        $this->lastModifiedBy = $lastModifiedBy;
    }

    /**
     * @return int
     */
    public function getLastModifiedBy() : int
    {
        return $this->lastModifiedBy;
    }

    /**
     * @param int $creator
     */
    public function setCreator(int $creator) : void
    {
        $this->creator = $creator;
    }

    /**
     * @return int
     */
    public function getCreator() : int
    {
        return $this->creator;
    }

    /**
     * @param int $lastModified
     */
    public function setLastModified(int $lastModified) : void
    {
        $this->lastModified = $lastModified;
    }

    /**
     * @return int
     */
    public function getLastModified() : int
    {
        return $this->lastModified;
    }

    /**
     * @param int $created
     */
    public function setCreated(int $created) : void
    {
        $this->created = $created;
    }

    /**
     * @return int
     */
    public function getCreated() : int
    {
        return $this->created;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @param int|null $userId
     */
    public function setId(?int $userId = null) : void
    {
        $this->userId = $userId;
    }

    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->userId;
    }
}
