<?php

use PHPUnit\Framework\TestCase;
use Refactor\Application\Controller\ApplicationController;

class ApplicationControllerTest extends TestCase
{

    private $fileSource;

    public function setUp()
    {
        $this->fileSource = __DIR__.'/../../data/users.csv';
    }

    /**
     * @dataProvider getProvider
     *
     * @param $parameter
     * @param $expected
     */
    public function testGet($parameter, $expected)
    {
        $mockedClass = $this->createMock(ApplicationController::class);
        $mockedClass->method('get')
                    ->willReturn($expected);

        $this->assertEquals($expected, $mockedClass->get($parameter));
    }

    public function getProvider()
    {
        return [
            [array(), '"1,Aman,Ramkumar\n2,Leni,Martin\n3,Louis,Dalbe\n"'],
            [array('id' => 1), '"1,Aman,Ramkumar"'],
            [array('id' => 'abc'), 'Unable to find user'],
            [null, 'Unable to find user']
        ];
    }
}