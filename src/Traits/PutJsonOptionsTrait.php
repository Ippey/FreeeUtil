<?php


namespace Ippey\FreeeUtil\Traits;


/**
 * Trait PutJsonOptionsTrait
 * @package Ippey\FreeeUtil\Traits
 * @property array $parameterKeys
 * @property array $options
 */
trait PutJsonOptionsTrait
{

    private $options = [];

    public function getMethod()
    {
        return 'PUT';
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
        $this->options['json'] = [];
        foreach ($this->getParameterKeys() as $key) {
            if (!empty($this->{$key})) {
                $this->options['json'][$key] = $this->{$key};
            }
        }
        return $this->options;
    }
}