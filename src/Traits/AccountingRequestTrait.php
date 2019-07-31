<?php


namespace Ippey\FreeeUtil\Traits;


/**
 * Trait AccountingRequestTrait
 * @package Ippey\FreeeUtil\Traits
 *
 * @method setHeaders($headers)
 */
trait AccountingRequestTrait
{
    public function setAccessToken($accessToken)
    {
        $this->setHeaders(['Authorization' => 'Bearer ' . $accessToken]);
    }
}