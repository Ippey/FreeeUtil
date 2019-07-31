<?php


namespace Ippey\FreeeUtil\Request;

interface AccountingRequestInterface extends RequestInterface
{
    public function setAccessToken($accessToken);
}