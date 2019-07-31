<?php


namespace Ippey\FreeeUtil\Response;


interface ResponseInterface
{
    public function __construct($headers, $body);

    public function getHeader($key);

    public function getBody();

    public function __get($name);
}