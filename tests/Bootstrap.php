<?php

use PHPUnit\Framework\TestCase;

class Bootstrap extends TestCase {

    public function testClient() {
        $client = new \UDX\Zoom\Client();
        $this->assertInstanceOf(\UDX\Zoom\Client::class, $client);
    }
}
