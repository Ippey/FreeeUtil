<?php


namespace Ippey\FreeeUtil;


use GuzzleHttp\Client;
use Ippey\FreeeUtil\Accounting\Users;

class FreeeUtil
{
    private $apiResolver;
    private $list = [
        Account::class,
        Users::class,
    ];

    public function __construct()
    {
        $this->apiResolver = new FreeeApiResolver();
        foreach ($this->list as $className) {
            $this->apiResolver->add($className);
        }
    }

    /**
     * @param string $key
     * @param string|null $accessToken
     * @return FreeeApiInterface
     */
    public function getApi($key, $accessToken = null)
    {
        $className = $this->apiResolver->resolve($key);
        $client = new Client();
        $instance = new $className($client, $accessToken);
        return $instance;
    }

    /**
     * 認可コード取得用URL取得
     *
     * @param $clientId
     * @param $redirectUri
     * @param string $responseType
     * @return string
     */
    public static function getAuthorizationUri($clientId, $redirectUri, $responseType = 'code')
    {
        $uri = 'https://accounts.secure.freee.co.jp/public_api/authorize?';
        $queryString = http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => $responseType
        ]);
        return $uri . $queryString;
    }
}