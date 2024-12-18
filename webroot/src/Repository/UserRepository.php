<?php

namespace src\Repository;

use \PDO;
use \PDOException;
use src\Model\User;

class UserRepository extends AbstractRepository {
    /**
     * Insert a user into the database
     *
     * @param User $user
     * @return void
     */
    public function insert(User $user)
    {
        try {
            $this->connect();

            $query = $this->connection->prepare("INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)");
            $query->execute([
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Email adres is al in gebruik.";
            return false;
        }
    }

    /**
     * Fetch all users from the database
     *
     * @return array
     */
    public function fetchAll(): array
    {
        $this->connect();

        /** @var \PDOStatement $query */
        $query = $this->connection->query("SELECT * FROM users");
        $results = $query->fetchAll();

        $articles = [];
        foreach ($results as $result) {
            $users[] = new User($result['id'], $result['username'], $result['password'], $result['email'], $result['role'], $result['admin']);
        }

        return $users;
    }

    /**
     * Get a user from the database
     *
     * @param string $username
     * @return User|null
     */
    public function getUser(string $username): ?User
    {
        $this->connect();

        $query = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute([
            'username' => $username
        ]);
        $result = $query->fetch();

        if ($result) {
            return new User($result['id'], $result['username'], $result['password'], $result['email'], $result['role']);
        }
        return null;
    }

    /**
     * Update a user in the database
     *
     * @param User $user
     * @return boolean
     */
    public function updateUser(User $user): bool
    {
        $this->connect();

        try {
            $query = $this->connection->prepare("UPDATE users SET email = :email, password = :password, role = :role WHERE id = :id");
            return $query->execute([
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getRole(),
                'id' => $user->getId(),
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Get a user with role from the database
     *
     * @param string $username
     * @return User|null
     */
    public function getUserWithRole(string $username): ?User
    {
        $this->connect();

        $query = $this->connection->prepare("
            SELECT u.id, u.username, u.password, u.email, u.role, r.role_name 
            FROM users u 
            JOIN roles r ON u.role = r.id 
            WHERE u.username = :username
        ");
        
        $query->execute(['username' => $username]);
        $result = $query->fetch();

        if ($result) {
            return new User(
                $result['id'],
                $result['username'],
                $result['password'],
                $result['email'],
                $result['role_name']
            );
        }
        
        return null;
    }
}

