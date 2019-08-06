<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class DealsRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $partner_id;
    private $account_item_id;
    private $partner_code;
    private $status;
    private $type;
    private $start_issue_date;
    private $end_issue_date;
    private $start_due_date;
    private $end_due_date;
    private $start_renew_date;
    private $end_renew_date;
    private $offset;
    private $limit;
    private $registered_from;
    private $accruals;

    private $parameterKeys = [
        'company_id',
        'partner_id',
        'account_item_id',
        'partner_code',
        'status',
        'type',
        'start_issue_date',
        'end_issue_date',
        'start_due_date',
        'end_due_date',
        'start_renew_date',
        'end_renew_date',
        'offset',
        'limit',
        'registered_from',
        'accruals',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/deals';
    }
}