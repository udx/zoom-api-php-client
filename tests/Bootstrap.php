<?php

use PHPUnit\Framework\TestCase;
use UDX\Zoom;

/**
 * Class Bootstrap
 */
class Bootstrap extends TestCase {

    /**
     * Test Client Create
     *
     */
    public function testClientCreate() {
        try {
            $client = new Zoom\Zoom('key', 'secret');
            $this->assertInstanceOf(Zoom\Zoom::class, $client);
        } catch ( Exception $e ) {
            $this->fail( $e );
        }
    }

    /**
     * Test Meetings Endpoint
     *
     */
    public function testMeetingsEndpoint() {
        try {
            $client = new Zoom\Zoom( 'key', 'secret' );
            $this->assertInstanceOf(Zoom\Endpoint\Meetings::class, $client->meetings);
            $this->assertInstanceOf(Zoom\Http\Request::class, $client->meetings);
            $this->assertTrue( method_exists( $client->meetings, 'list' ) );
            $this->assertTrue( method_exists( $client->meetings, 'create' ) );
            $this->assertTrue( method_exists( $client->meetings, 'meeting' ) );
            $this->assertTrue( method_exists( $client->meetings, 'records' ) );
        } catch ( Exception $e ) {
            $this->fail( $e );
        }
    }
}
