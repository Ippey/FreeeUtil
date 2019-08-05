<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class AccountItemsRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $base_date;

    private $options = [];

    private $parameterKeys = [
        'company_id',
        'base_date',
    ];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/account_items';
    }
}