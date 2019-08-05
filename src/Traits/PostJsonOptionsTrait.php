<?php


namespace Ippey\FreeeUtil\Traits;

/**
 * Trait PostJsonOptionsTrait
 * @package Ippey\FreeeUtil\Traits
 *
 * @property $parameterKeys
 * @property $options
 */
trait PostJsonOptionsTrait
{

    private $options = [];

    public function getMethod()
    {
        return 'POST';
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