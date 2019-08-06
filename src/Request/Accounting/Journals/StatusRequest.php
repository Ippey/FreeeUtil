<?php


namespace Ippey\FreeeUtil\Request\Accounting\Journals;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class StatusRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $id;
    private $visible_tags;
    private $start_date;
    private $end_date;

    private $parameterKeys = [
        'company_id',
        'id',
        'visible_tags',
        'start_date',
        'end_date',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/journals/reports/' . $this->id . '/status';
    }
}