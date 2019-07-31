<?php


namespace Ippey\FreeeUtil\Request;

use Ippey\FreeeUtil\Request\RequestInterface;

interface AccountingRequestInterface extends RequestInterface
{
    public function setAccessToken($accessToken);
}