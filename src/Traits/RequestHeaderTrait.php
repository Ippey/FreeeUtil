<?php


namespace Ippey\FreeeUtil\Traits;


trait RequestHeaderTrait
{
    private $options = [];

    public function setHeaders($headers)
    {
        if (empty($this->options['headers'])) {
            $this->options['headers'] = [];
        }
        $this->options['headers'] += $headers;
    }

    public function getHeaders()
    {
        return $this->options['headers'];
    }

}