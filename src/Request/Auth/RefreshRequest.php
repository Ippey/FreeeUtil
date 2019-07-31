<?php


namespace Ippey\FreeeUtil\Request\Auth;


use Ippey\FreeeUtil\Traits\RequestHeaderTrait;
use Ippey\FreeeUtil\Request\RequestInterface;

/**
 * Class RefreshRequest
 * @package Ippey\FreeeUtil\Auth\Request
 */
class RefreshRequest implements RequestInterface
{
    use RequestHeaderTrait;

    private $clietn_id;
    private $client_secret;
    private $refresh_token;
    private $redirect_uri;
    private $grant_type = 'refresh_token';

    private $paramerterKeys = [
        'client_id',
        'client_secret',
        'refresh_token',
        'redirect_uri',
        'grant_type',
    ];
    private $options = [];

    public function getUrl()
    {
        return 'https://accounts.secure.freee.co.jp/public_api/token';
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getParameterKeys()
    {
        return $this->paramerterKeys;
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
        $this->options['form_params'] = [];
        foreach ($this->getParameterKeys() as $key) {
            if (!empty($this->{$key})) {
                $this->options['form_params'][$key] = $this->{$key};
            }
        }
        return $this->options;
    }
}