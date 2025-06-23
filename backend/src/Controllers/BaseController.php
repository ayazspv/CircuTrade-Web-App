<?php

namespace Controllers;

use Controllers\JWTController;

abstract class BaseController
{
    protected $jwtController;

    protected function getUserFromJwt() {
        return $this->jwtController->checkForJwt();
    }

    protected function respond($data)
    {
        $this->respondWithCode(200, $data);
    }

    protected function respondWithError($httpCode, $message)
    {
        $data = array('errorMessage' => $message);
        $this->respondWithCode($httpCode, $data);
    }

    protected function respondWithCode($httpCode, $data): void
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($httpCode);
        echo json_encode($data);
    }

    protected function getRequestData()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        return $this->sanitize($data);
    }
    
    protected function sanitize($data)
    {
        if (is_object($data)) {
            foreach ($data as $key => $value) {
                if (is_string($value)) {
                    $data->$key = htmlspecialchars($value);
                }
            }
        } elseif (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_string($value)) {
                    $data[$key] = htmlspecialchars($value);
                }
            }
        }
        return $data;
    }

}