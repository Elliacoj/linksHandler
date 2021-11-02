<?php

namespace Amaur\App\entity;

class User {
    private ?int $id;
    private ?string $lastname;
    private ?string $firstname;
    private ?string $mail;
    private ?string $password;
    private ?string $role;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $lastname
     * @param string|null $firstname
     * @param string|null $mail
     * @param string|null $password
     */
    public function __construct(int $id = null, string $lastname = null, string $firstname = null, string $mail = null, string $password = null, string $role = null)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->password = $password;
        $this->role = $role;
    }

    /**
     * Return the id of User
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return the lastname of User
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the lastname of User
     * @param string|null $lastname
     * @return User
     */
    public function setLastname(?string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Return the firstname of User
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the firstname of User
     * @param string|null $firstname
     * @return User
     */
    public function setFirstname(?string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Return the mail of User
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set the mail of User
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Return the password of User
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Return the role of User
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * Set the role of User
     * @param string|null $role
     * @return User
     */
    public function setRole(?string $role): User
    {
        $this->role = $role;
        return $this;
    }
}