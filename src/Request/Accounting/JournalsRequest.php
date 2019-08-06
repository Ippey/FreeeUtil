<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class JournalsRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $download_type;
    private $company_id;
    private $visible_tags;
    private $start_date;
    private $end_date;

    private $parameterKeys = [
        'download_type',
        'company_id',
        'visible_tags',
        'start_date',
        'end_date',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/journals';
    }

}