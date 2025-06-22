<?php

namespace Controllers;

use Controllers\BaseController;
use Controllers\JWTController;
use Services\UserService;

class UserController extends BaseController
{
    private $userService;
    private $jwtController;

    public function __construct()
    {
        $this->userService = new \Services\UserService();
        $this->jwtController = new \Controllers\JWTController();
    }

    public function login()
    {
        $credentials = $this->getRequestData();
        try {
            $user = $this->userService->verifyAndGetUser($credentials->email, $credentials->password);
        } catch (\PDOException $e) {
            $this->respondWithError(401, $e->getMessage());
            return;
        }
        if (empty($user)) {
            $this->respondWithError(401, "Invalid Password Try Again");
            return;
        }

        // Generate JWT token
        $token = $this->jwtController->generateJWT($user);

        // Prepare response payload
        $response = [
            'success' => true,
            'id' => $user->getId(),
            'token' => $token,
            'userEmail' => $user->getEmail(),
            'userType' => method_exists($user->getRole(), 'value') ? $user->getRole()->value : (string) $user->getRole()
        ];

        // Respond with the payload
        $this->respond($response);
    }

    public function register($user)
    {
        try {
            // Retrieve and decode JSON payload
            $data = json_decode(file_get_contents('php://input'), true);

            // Validate input
            if (!isset($data['name']) || !isset($data['email']) || !isset($data['type']) || !isset($data['password'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'errors' => ['other' => 'Name, email, type, and password are required']]);
                return;
            }

            $name = $data['name'];
            $email = $data['email'];
            $type = $data['type'];
            $password = $data['password'];

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user = $this->userService->registerUser($name, $email, $type, $hashedPassword);

            if ($user) {
                http_response_code(201); // Created
                echo json_encode(['success' => true, 'message' => 'User registered successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'errors' => ['other' => 'Failed to register user']]);
            }
        } catch (\Exception $e) {
            error_log("Exception in register: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['success' => false, 'errors' => ['other' => 'An unexpected error occurred']]);
        }
    }

    public function me($user)
    {
        try {
            $userData = $this->userService->me($user->id);
            if ($userData) {
                $this->respond($userData);
            } else {
                $this->respondWithError(404, "User not found");
            }
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function addUser($user)
    {
        try {
            $result = $this->userService->addUser($user);
            if ($result) {
                $this->respond(['success' => true, 'user' => $result]);
            } else {
                $this->respondWithError(500, "Failed to add user");
            }
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function editUser($user)
    {
        try {
            $result = $this->userService->editUser($user);
            if ($result) {
                $this->respond(['success' => true]);
            } else {
                $this->respondWithError(500, "Failed to update user");
            }
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function deleteUser($user)
    {
        try {
            $result = $this->userService->deleteUser($user->id);
            if ($result) {
                $this->respond(['success' => true]);
            } else {
                $this->respondWithError(500, "Failed to delete user");
            }
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getAllUsers()
    {
        try {
            $users = $this->userService->getAllUsers();
            $this->respond($users);
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getLatestUser()
    {
        try {
            $user = $this->userService->getLatestUser();
            if ($user) {
                $this->respond($user);
            } else {
                $this->respondWithError(404, "No users found");
            }
        } catch (\PDOException $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }


    public static function test() {
        error_log("✅ /api/test route hit");
    header('Content-Type: application/json');
    echo json_encode(['message' => '✅ It works!']);
    }
}
