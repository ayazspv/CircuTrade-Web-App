<?php

namespace Repositories;

require_once __DIR__ . '/Repository.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/UserRole.php';
require_once __DIR__ . '/../Models/UserStatus.php';

use Models\User;
use PDO;

class UserRepository extends Repository
{
    public function login($email, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null;
            }

            if (password_verify($password, $result["password"])) {
                return $this->mapToUser($result);
            }
            return null;
        } catch (\PDOException $e) {
            error_log("Database error in login: " . $e->getMessage());
            return null;
        }
    }

    public function registerUser($name, $email, $type, $hashedPassword)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO users (firstname, lastname, role, email, password, status)
                VALUES (:firstname, '', :role, :email, :password, 'active')
            ");
            $stmt->bindParam(':firstname', $name);
            $stmt->bindParam(':role', $type);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $id = $this->connection->lastInsertId();
                return $this->getUserById($id);
            }
            return null;
        } catch (\PDOException $e) {
            error_log("Database error in registerUser: " . $e->getMessage());
            return null;
        }
    }

    public function getUserById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) return null;
            return $this->mapToUser($result);
        } catch (\PDOException $e) {
            error_log("Database error in getUserById: " . $e->getMessage());
            return null;
        }
    }

    public function addUser($user)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO users (firstname, lastname, role, email, password, phoneNumber, status)
                VALUES (:firstname, :lastname, :role, :email, :password, :phoneNumber, :status)
            ");
            $stmt->bindParam(':firstname', $user->firstname);
            $stmt->bindParam(':lastname', $user->lastname);
            $stmt->bindParam(':role', $user->role);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':password', $user->password);
            $stmt->bindParam(':phoneNumber', $user->phoneNumber);
            $stmt->bindParam(':status', $user->status);

            if ($stmt->execute()) {
                $id = $this->connection->lastInsertId();
                return $this->getUserById($id);
            }
            return null;
        } catch (\PDOException $e) {
            error_log("Database error in addUser: " . $e->getMessage());
            return null;
        }
    }

    public function editUser($user)
    {
        try {
            $fields = [
                'firstname = :firstname',
                'lastname = :lastname',
                'role = :role',
                'email = :email',
                'phoneNumber = :phoneNumber',
                'status = :status'
            ];
            if (!empty($user->password)) {
                $fields[] = 'password = :password';
            }
            $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $user->id);
            $stmt->bindParam(':firstname', $user->firstname);
            $stmt->bindParam(':lastname', $user->lastname);
            $stmt->bindParam(':role', $user->role);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':phoneNumber', $user->phoneNumber);
            $stmt->bindParam(':status', $user->status);
            if (!empty($user->password)) {
                $stmt->bindParam(':password', $user->password);
            }
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Database error in editUser: " . $e->getMessage());
            return false;
        }
    }

    public function deleteUser($userId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $userId);
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Database error in deleteUser: " . $e->getMessage());
            return false;
        }
    }

    public function getAllUsers()
    {
        try {
            $stmt = $this->connection->query("SELECT * FROM `users`");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Database error in getAllUsers: " . $e->getMessage());
            return [];
        }
    }

    public function getLatestUser()
    {
        try {
            $stmt = $this->connection->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) return null;
            return $this->mapToUser($result);
        } catch (\PDOException $e) {
            error_log("Database error in getLatestUser: " . $e->getMessage());
            return null;
        }
    }

    private function mapToUser($data)
    {
        // Convert role and status strings to enums
        $role = \Models\UserRole::from($data["role"]);
        $status = \Models\UserStatus::from($data["status"]);

        return new User(
            $data["id"],
            $data["firstname"],
            $data["lastname"],
            $role,
            $data["email"],
            $data["password"],
            $data["phoneNumber"] ?? null,
            $status
        );
    }
}