<?php

use TeamZac\ZacTax\Industries;
use TeamZac\ZacTax\Jurisdictions;
use TeamZac\ZacTax\Regions;
use TeamZac\ZacTax\Taxpayers;
use TeamZac\ZacTax\Users;
use TeamZac\ZacTax\ZacTax;

class ZacTaxTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function it_provides_resource_as_a_property()
    {
        $zactax = new ZacTax;

        $this->assertInstanceOf( Industries::class, $zactax->industries);
        $this->assertInstanceOf( Jurisdictions::class, $zactax->jurisdictions);
        $this->assertInstanceOf( Regions::class, $zactax->regions);
        $this->assertInstanceOf( Taxpayers::class, $zactax->taxpayers);
        $this->assertInstanceOf( Users::class, $zactax->users);

        $this->assertNull($zactax->nonExistentResource);
    }

    /** @test */
    function it_provides_options_as_a_property()
    {
        $zactax = new ZacTax([
            'baseUri' => 'base_uri',
            'apiToken' => 'token',
            'jurisdictionId' => 'jurisdiction',
            'debug' => true,
        ]);

        $this->assertEquals('base_uri', $zactax->baseUri);
        $this->assertEquals('token', $zactax->apiToken);
        $this->assertEquals('jurisdiction', $zactax->jurisdictionId);
        $this->assertEquals(true, $zactax->debug);

        $this->assertNull($zactax->nonExistentOption);
    }
}