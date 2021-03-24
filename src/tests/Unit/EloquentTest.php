<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class EloquentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


      /**
     * @test
     */
    public function IDを指定して１件取得()
    {
        $user = \App\Eloquents\User::find(1);

        dd($user);

        $this->assertTrue(true);
    }
}
