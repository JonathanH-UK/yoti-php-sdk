<?php

namespace Yoti\Test\DocScan\Session\Retrieve\Configuration\Capture;

use Yoti\DocScan\Constants;
use Yoti\DocScan\Session\Retrieve\Configuration\Capture\RequiredResourceResponse;
use Yoti\DocScan\Session\Retrieve\Configuration\Capture\Source\EndUserAllowedSourceResponse;
use Yoti\Test\TestCase;

/**
 * @coversDefaultClass \Yoti\DocScan\Session\Retrieve\Configuration\Capture\RequiredResourceResponse
 */
class RequiredResourceResponseTest extends TestCase
{
    private const SOME_TYPE = 'SOME_TYPE';
    private const SOME_ID = 'SOME_ID';
    private const SOME_STATE = 'SOME_STATE';
    private const SOME_ALLOWED_SOURCES = [
        [
            'type' => Constants::END_USER,
        ],
    ];

    /**
     * @test
     * @covers ::__construct
     * @covers ::getType
     * @covers ::getId
     * @covers ::getState
     * @covers ::getAllowedSources
     * @covers ::createAllowedSourceFromArray
     * @covers ::isRelyingBusinessAllowed
     */
    public function shouldBuildCorrectly()
    {
        $input = [
            'type' => self::SOME_TYPE,
            'id' => self::SOME_ID,
            'state' => self::SOME_STATE,
            'allowed_sources' => self::SOME_ALLOWED_SOURCES,
        ];

        $result = new RequiredResourceResponse($input);


        $this->assertEquals(self::SOME_TYPE, $result->getType());
        $this->assertEquals(self::SOME_ID, $result->getId());
        $this->assertEquals(self::SOME_STATE, $result->getState());

        $this->assertCount(1, $result->getAllowedSources());

        $this->assertInstanceOf(EndUserAllowedSourceResponse::class, $result->getAllowedSources()[0]);
        $this->assertFalse($result->isRelyingBusinessAllowed());
    }
}
