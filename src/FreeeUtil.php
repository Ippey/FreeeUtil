<?php


namespace Ippey\FreeeUtil;


use GuzzleHttp\Client;

class FreeeUtil
{
    /**
     * @return ApiClient
     */
    public static function getApiClient()
    {
        $httpClient = new Client();
        $apiClient = new ApiClient($httpClient);
        return $apiClient;
    }

    /**
     * 認可コード取得用URL取得
     *
     * @param string $clientId
     * @param string $redirectUri
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