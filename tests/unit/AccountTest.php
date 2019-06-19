<?php

use Codeception\Test\Unit;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use Ippey\FreeeUtil\Account;
use Ippey\FreeeUtil\FreeeUtilException;

class AccountTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    /**
     * @throws FreeeUtilException
     */
    public function testToken()
    {
        $handler = new MockHandler([
            new Response(200, [], '{
  "access_token": "some_access_token",
  "token_type": "bearer",
  "expires_in": 86400,
  "refresh_token": "some_refresh_token",
  "scope": "read write"
}'),
            new Response(500),
        ]);
        $httpClient = new Client(['handler' => $handler]);
        $api = new Account($httpClient);
        $response = $api->token('hoge', 'hoge', 'hoge', 'hoge');
        $this->assertEquals('some_access_token', $response->access_token);
        $this->assertEquals('some_refresh_token', $response->refresh_token);

        $this->expectException(FreeeUtilException::class);
        $api->token('hoge', 'hoge', 'hoge', 'hoge');
    }

    /**
     * @throws FreeeUtilException
     */
    public function testRefresh()
    {
        $handler = new MockHandler([
            new Response(200, [], '{
  "access_token": "some_access_token",
  "token_type": "bearer",
  "expires_in": 86400,
  "refresh_token": "some_refresh_token",
  "scope": "read write"
}'),
            new Response(500),
        ]);
        $httpClient = new Client(['handler' => $handler]);
        $api = new Account($httpClient);
        $response = $api->refresh('hoge', 'hoge', 'hoge', 'hoge');
        $this->assertEquals('some_access_token', $response->access_token);
        $this->assertEquals('some_refresh_token', $response->refresh_token);

        $this->expectException(FreeeUtilException::class);
        $api->refresh('hoge', 'hoge', 'hoge', 'hoge');
    }

    /**
     * @env freee
     * @throws FreeeUtilException
     */
    public function testAuthorization()
    {
        $httpClient = new Client();
        $api = new Account($httpClient);
        $clientId = getenv('FREEE_CLIENT_ID');
        $clientSecret = getenv('FREEE_CLIENT_SECRET');
        $code = getenv('FREEE_AUTH_CODE');
        $redirectUri = getenv('FREEE_REDIRECT_URI');

        $response = $api->token($clientId, $clientSecret, $code, $redirectUri);
        codecept_debug($response);
        $refreshToken = $response->refresh_token;
        $response = $api->refresh($clientId, $clientSecret, $refreshToken, $redirectUri);
        codecept_debug($response);
    }
}