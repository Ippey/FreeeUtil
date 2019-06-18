<?php

use Ippey\FreeeUtil\FreeeUtil;

class FreeeUtilTest extends \Codeception\Test\Unit
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
    public function testGetAuthorizationUri()
    {
        $url = FreeeUtil::getAuthorizationUri('abcde', 'https://www.google.co.jp');
        $this->assertEquals('https://accounts.secure.freee.co.jp/public_api/authorize?client_id=abcde&redirect_uri=https%3A%2F%2Fwww.google.co.jp&response_type=code', $url);
    }
}