<?php


namespace Ippey\FreeeUtil\Request\Accounting\AccountItems;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class GetRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $id;

    private $parameterKeys = [
        'company_id',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/account_items/' . $this->id;
    }

}