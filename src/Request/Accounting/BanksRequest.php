<?php


namespace Ippey\FreeeUtil\Request\Accounting;


use Ippey\FreeeUtil\Request\AccountingRequestInterface;
use Ippey\FreeeUtil\Traits\AccountingRequestTrait;
use Ippey\FreeeUtil\Traits\RequestHeaderTrait;

class BanksRequest implements AccountingRequestInterface
{
    use RequestHeaderTrait;
    use AccountingRequestTrait;

    private $offset = 0;
    private $limit;
    private $type;

    private $parameterKeys = [
        'offset',
        'limit',
        'type',
    ];

    private $options = [];

    public function getUrl()
    {
        return 'https://api.freee.co.jp/api/1/banks';
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getParameterKeys()
    {
        return $this->parameterKeys;
    }

    public function setParameter($key, $value)
    {
        $this->{$key} = $value;
    }

    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    public function getOptions()
    {
        $this->options['query'] = [];
        foreach ($this->getParameterKeys() as $key) {
            if (!empty($this->{$key})) {
                $this->options['query'][$key] = $this->{$key};
            }
        }
        return $this->options;
    }
}