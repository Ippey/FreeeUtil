<?php

use Codeception\Test\Unit;
use Ippey\FreeeUtil\Account;
use Ippey\FreeeUtil\FreeeApiResolver;

class FreeeApiResolverTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testResolve()
    {
        $resolver = new FreeeApiResolver();
        $resolver->add(Account::class);
        $this->assertEquals(Account::class, $resolver->resolve('account'));
    }
}