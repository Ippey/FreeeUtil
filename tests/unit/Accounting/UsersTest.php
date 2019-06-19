<?php namespace Accounting;

use Codeception\Test\Unit;
use Ippey\FreeeUtil\Accounting\Users;
use Ippey\FreeeUtil\FreeeUtil;
use Ippey\FreeeUtil\FreeeUtilException;

class UsersTest extends Unit
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

    /**
     * @env accounting
     * @throws FreeeUtilException
     */
    public function testSomeFeature()
    {
        $accessToken = getenv('FREEE_ACCESS_TOKEN');
        $util = new FreeeUtil();
        /** @var Users $api */
        $api = $util->getApi('accounting/users', $accessToken);
        $result = $api->me(true);
        codecept_debug($result);
        $result = $api->capabilities('1887053');
        codecept_debug($result);
        $this->expectException(FreeeUtilException::class);
        $result = $api->capabilities('1887052');
        codecept_debug($result);
    }
}