<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class PartnersRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $offset;
    private $limit;
    private $keyword;

    private $parameterKeys = [
        'company_id',
        'offset',
        'limit',
        'keyword',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/partners';
    }
}