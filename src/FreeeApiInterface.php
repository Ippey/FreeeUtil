<?php


namespace Ippey\FreeeUtil;


use GuzzleHttp\Client;

interface FreeeApiInterface
{
    public function __construct(Client $httpClient, $accessToken = null);

    public static function supports($key);
}