<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\GetOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class ManualJournalsRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use GetOptionsTrait;


    private $company_id;
    private $start_issue_date;
    private $end_issue_date;
    private $entry_side;
    private $account_item_id;
    private $min_amount;
    private $max_amount;
    private $partner_id;
    private $partner_code;
    private $item_id;
    private $section_id;
    private $segment_1_tag_id;
    private $segment_2_tag_id;
    private $segment_3_tag_id;
    private $comment_status;
    private $comment_important;
    private $adjustment;
    private $txn_number;
    private $offset;
    private $limit;

    private $parameterKeys = [
        'company_id',
        'start_issued_date',
        'end_issue_date',
        'entry_side',
        'account_item_id',
        'min_amount',
        'max_amount',
        'partner_id',
        'segment_1_tag_id',
        'segment_2_tag_id',
        'segment_3_tag_id',
        'comment_status',
        'comment_important',
        'adjustment',
        'txn_number',
        'offset',
        'limit',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/manual_journals';
    }


}