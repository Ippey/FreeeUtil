<?php


namespace Ippey\FreeeUtil\Request;


interface RequestInterface
{
    public function getUrl();

    public function getMethod();

    public function setHeaders($headers);

    public function getHeaders();

    public function getParameterKeys();

    public function setParameter($key, $value);

    public function setOption($key, $value);

    public function getOptions();
}