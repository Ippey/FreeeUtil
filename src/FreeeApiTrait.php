<?php


namespace Ippey\FreeeUtil;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

trait FreeeApiTrait
{
    private $httpClient;
    private $accessToken;

    /**
     * FreeeApiInterface constructor.
     * @param Client $httpClient
     * @param null $accessToken
     */
    public function __construct(Client $httpClient, $accessToken = null)
    {
        $this->httpClient = $httpClient;
        $this->accessToken = $accessToken;
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed
     * @throws FreeeUtilException
     */
    protected function get($uri, $data = [], $headers = [])
    {
        $headers['Authorization'] = $this->getAuthorizationHeaderValue();
        $options = [
            'query' => $data,
            'headers' => $headers,
        ];
        try {
            $response = $this->httpClient->get($uri, $options);
            if ($response->getStatusCode() >= 400) {
                throw new FreeeUtilException('error');
            }
            return json_decode((string)$response->getBody());
        } catch (TransferException $e) {
            throw new FreeeUtilException($e->getMessage());
        }
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed
     * @throws FreeeUtilException
     */
    protected function post($uri, $data = [], $headers = [])
    {
        $headers += [
            'Content-Type' => 'application/json',
        ];
        $authorizationValue = $this->getAuthorizationHeaderValue();
        if (!empty($authorizationValue)) {
            $headers['Authorization'] = $this->getAuthorizationHeaderValue();
        }
        $options = [
            'headers' => $headers,
        ];
        if ($headers['Content-Type'] == 'application/json') {
            $options['json'] = $data;
        } else {
            $options['form_params'] = $data;
        }
        try {
            $response = $this->httpClient->post($uri, $options);
            if ($response->getStatusCode() >= 400) {
                throw new FreeeUtilException('error');
            }
            return json_decode((string)$response->getBody());
        } catch (TransferException $e) {
            throw new FreeeUtilException($e->getMessage());
        }
    }

    protected function getAuthorizationHeaderValue()
    {
        if (empty($this->accessToken)) {
            return '';
        }
        $value = 'Bearer ' . $this->accessToken;
        return $value;
    }
}