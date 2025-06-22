<?php

namespace Controllers;

abstract class BaseController
{
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
}