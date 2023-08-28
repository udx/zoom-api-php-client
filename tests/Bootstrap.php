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
            $client = new Zoom\Zoom('id', 'key', 'secret');
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
            $client = new Zoom\Zoom( 'id', 'key', 'secret' );
            $this->assertInstanceOf(Zoom\Endpoint\Meetings::class, $client->meetings);
            $this->assertInstanceOf(Zoom\Http\Request::class, $client->meetings);
            $this->assertTrue( method_exists( $client->meetings, 'list' ),
                "'list' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'create' ),
                "'create' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'meeting' ),
                "'meeting' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'remove' ),
                "'remove' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'update' ),
                "'update' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'status' ),
                "'status' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'listRegistrants' ),
                "'listRegistrants' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'addRegistrant' ),
                "'addRegistrant' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'updateRegistrantStatus' ),
                "'updateRegistrantStatus' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'pastMeeting' ),
                "'pastMeeting' method is missing" );
            $this->assertTrue( method_exists( $client->meetings, 'pastMeetingParticipants' ),
                "'pastMeetingParticipants' method is missing" );
        } catch ( Exception $e ) {
            $this->fail( $e );
        }
    }
}
