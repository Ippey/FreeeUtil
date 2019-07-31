<?php


namespace Ippey\FreeeUtil\Traits;


trait ResponseTrait
{
    private $headers;
    private $body;

    public function __construct($headers, $body)
    {
        $this->headers = $headers;
        $this->body = json_decode($body);
    }

    public function getHeader($key)
    {
        return $this->headers[$key];
    }

    /**
     * @return object
     */
    public function getBody()
    {
        return $this->body;
    }

    public function __get($name)
    {
        return $this->body->{$name};
    }
}