<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{ // テスト処理
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example() // testで始まるメソッド名はテスト用のメソッドと判断される
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
