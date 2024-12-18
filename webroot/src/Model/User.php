<?php

namespace src\Model;

class User {
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $role;

    public function __construct(int $id, string $username, string $password, string $email, string $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * Get the value of id
     *
     * @return integer
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Get the value of role
     *
     * @return string
     */
    public function getRole(): string {
        return $this->role;
    }
}