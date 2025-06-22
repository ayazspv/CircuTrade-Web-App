<?php 

namespace Controllers;

use Controllers\BaseController;

class JWTController extends BaseController {

    public function generateJWT($user)
    {
        $secret_key = "VERY_TOP_SECRET";
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600;
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'data' => [
                'id' => $user->userID,
                'email' => $user->userEmail,
                'name' => $user->userName
            ]
        ];
    
        return \Firebase\JWT\JWT::encode($payload, $secret_key, 'HS256');
    }

    protected function checkForJwt()
    {
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            $this->respondWithError(401, 'Authorization token is missing');
            exit();
        }

        $authHeader = $headers['Authorization'];
        $token = str_replace('Bearer ', '', $authHeader);

        try {
            $decoded = \Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key('VERY_TOP_SECRET', 'HS256'));
            return $decoded;
        } catch (\Exception $e) {
            $this->respondWithError(401, 'Invalid or expired token');
            exit();
        }
    }
}