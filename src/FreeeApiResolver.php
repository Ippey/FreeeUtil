<?php


namespace Ippey\FreeeUtil;


use InvalidArgumentException;

class FreeeApiResolver
{
    /** @var FreeeApiInterface[] */
    private $list = [];

    public function __construct()
    {
    }

    /**
     * @param $className
     */
    public function add($className)
    {
        $this->list[] = $className;
    }

    /**
     * @param $key
     * @return FreeeApiInterface
     */
    public function resolve($key)
    {
        foreach ($this->list as $className) {
            if ($className::supports($key) == true) {
                return $className;
            }
        }
        throw new InvalidArgumentException('class not found.');
    }
}