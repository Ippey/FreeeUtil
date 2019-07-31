<?php


namespace Ippey\FreeeUtil\Request\Auth;

use Ippey\FreeeUtil\Traits\RequestHeaderTrait;
use Ippey\FreeeUtil\Request\RequestInterface;

/**
 * Class TokenRequest
 * @package Ippey\FreeeUtil\Auth
 *
 * @property string $client_id
 * @property string $client_secret
 * @property string $redirect_uri
 * @property string $grant_type
 */
class TokenRequest implements RequestInterface
{
    use RequestHeaderTrait;

    private $client_id;
    private $client_secret;
    private $code;
    private $redirect_uri;
    private $grant_type = 'authorization_code';

    private $paramerterKeys = [
        'client_id',
        'client_secret',
        'code',
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