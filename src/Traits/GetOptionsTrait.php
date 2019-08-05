<?php


namespace Ippey\FreeeUtil\Traits;


/**
 * Trait GetOptionsTrait
 * @package Ippey\FreeeUtil\Traits
 *
 * @property $parameterKeys
 * @property $options
 */
trait GetOptionsTrait
{
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