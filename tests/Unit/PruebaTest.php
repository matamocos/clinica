<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PruebaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPrueba()
    {
         $response = $this->get('/');

         $response->assertStatus(200);
    }
}
