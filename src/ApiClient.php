<?php


namespace Ippey\FreeeUtil;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Ippey\FreeeUtil\Request\RequestInterface;
use Ippey\FreeeUtil\Response\Response;
use Ippey\FreeeUtil\Response\ResponseInterface;

class ApiClient
{
    /** @var Client */
    private $httpClient;

    /**
     * ApiClient constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws FreeeUtilException
     */
    public function sendRequest(RequestInterface $request)
    {
        $result = null;
        try {
            $result = $this->httpClient->request(
                $request->getMethod(),
                $request->getUrl(),
                $request->getOptions()
            );
            if ($result->getStatusCode() >= 400) {
                throw new FreeeUtilException('error');
            }
            $response = new Response($result->getHeaders(), $result->getBody());
            return $response;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                /** @var \GuzzleHttp\Psr7\Response $response */
                $response = $e->getResponse();
                print_r($e->getRequest());
                print_r((string)$response->getBody());
            }
            throw new FreeeUtilException($e->getMessage());
        } catch (GuzzleException $e) {
            print_r($request->getOptions());
            throw new FreeeUtilException($e->getMessage());
        }
    }
}