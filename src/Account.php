<?php


namespace Ippey\FreeeUtil;


class Account implements FreeeApiInterface
{
    use FreeeApiTrait;

    const KEY = 'account';
    private $baseUri = 'https://accounts.secure.freee.co.jp/public_api';

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $code
     * @param $redirectUri
     * @return mixed
     * @throws FreeeUtilException
     */
    public function token($clientId, $clientSecret, $code, $redirectUri)
    {
        $data = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'grant_type' => 'authorization_code',
        ];
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $response = $this->post($this->baseUri . '/token', $data, $headers);
        return $response;
    }

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $refreshToken
     * @param $redirectUri
     * @return mixed
     * @throws FreeeUtilException
     */
    public function refresh($clientId, $clientSecret, $refreshToken, $redirectUri)
    {
        $data = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
            'redirect_uri' => $redirectUri,
            'grant_type' => 'refresh_token',
        ];
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $response = $this->post($this->baseUri . '/token', $data, $headers);
        return $response;
    }

    public static function supports($key)
    {
        if ($key === self::KEY) {
            return true;
        }
        return false;
    }
}