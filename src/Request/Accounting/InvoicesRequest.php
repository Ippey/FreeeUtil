<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class InvoicesRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;

    private $company_id;
    private $partner_id;
    private $partner_code;
    private $issue_date_start;
    private $issue_date_end;
    private $due_date_start;
    private $due_date_end;
    private $invoice_number;
    private $description;
    private $invoice_status;
    private $payment_status;
    private $offset;
    private $limit;

    private $parameterKeys = [
        'company_id',
        'partner_id',
        'partner_code',
        'issue_date_start',
        'issue_date_end',
        'due_date_start',
        'due_date_end',
        'invoice_number',
        'description',
        'invoice_status',
        'payment_status',
        'offset',
        'limit',
    ];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/invoices';
    }


    private $options = [];
}