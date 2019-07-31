<?php


namespace Ippey\FreeeUtil;


use Prophecy\Exception\Doubler\MethodNotFoundException;

/**
 * Class Account
 * @package Ippey\FreeeUtil
 *
 */
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
    private function token($clientId, $clientSecret, $code, $redirectUri)
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
    private function refresh($clientId, $clientSecret, $refreshToken, $redirectUri)
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

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws FreeeUtilException
     */
    public function __call($name, $arguments)
    {
        switch ($name) {
            case 'token':
                return $this->token($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
                break;
            case 'refresh':
                return $this->refresh($arguments[0], $arguments[1], $arguments[2], $arguments[3]);
                break;
            default:
                throw new MethodNotFoundException('method not found.', self::class, $name);
        }
    }
}