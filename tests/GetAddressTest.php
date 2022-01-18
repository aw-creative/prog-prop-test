<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class GetAddressTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostcode()
    {
        $response = $this->call('GET', '/find/nn95fb');
        $this->assertEquals(200, $response->status());
    }
}
