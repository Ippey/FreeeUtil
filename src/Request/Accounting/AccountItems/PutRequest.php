<?php


namespace Ippey\FreeeUtil\Request\Accounting\AccountItems;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\PutJsonOptionsTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class PutRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;
    use PutJsonOptionsTrait;

    private $id;
    private $company_id;
    private $account_item = [];

    private $parameterKeys = [
        'company_id',
        'account_item',
    ];

    private $itemParameterKeys = [
        'name',
        'shortcut',
        'shortcut_num',
        'tax_name',
        'group_name',
        'account_category',
        'corresponding_income_name',
        'corresponding_expense_name',
        'accumulated_dep_account_item_name',
        'searchable',
        'items',
        'partners',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/account_items/' . $this->id;
    }

    public function getItemParameterKeys()
    {
        return $this->itemParameterKeys;
    }

    public function setItemParameter($key, $val)
    {
        $this->account_item[$key] = $val;
    }

    public function appendItems($id)
    {
        $this->account_item['items'] = isset($this->account_item['items']) ? $this->account_item['items'] : [];
        $this->account_item['items'][] = ['id' => $id];
    }

    public function appendPartners($id)
    {
        $this->account_item['partners'] = isset($this->account_item['partners']) ? $this->account_item['partners'] : [];
        $this->account_item['partners'][] = ['id' => $id];
    }
}