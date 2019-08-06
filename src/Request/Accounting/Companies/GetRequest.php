<?php


namespace Ippey\FreeeUtil\Request\Accounting\Companies;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class GetRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $id;
    private $details;
    private $account_items;
    private $taxes;
    private $items;
    private $partners;
    private $sections;
    private $tags;
    private $walletables;

    private $parameterKeys = [
        'details',
        'account_items',
        'taxes',
        'items',
        'partners',
        'sections',
        'tags',
        'walletables',
    ];
    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/banks/' . $this->id;
    }

}