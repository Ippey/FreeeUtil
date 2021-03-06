<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class BanksRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $offset = 0;
    private $limit;
    private $type;

    private $parameterKeys = [
        'offset',
        'limit',
        'type',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/banks';
    }


}