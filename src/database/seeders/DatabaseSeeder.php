<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RestdataTableSeeder::class); // call(): Seederクラスにあるメソッド。これにより指定したクラスのrunメソッドが呼び出され、シーディング処理が実行されるようになる
    }
}
