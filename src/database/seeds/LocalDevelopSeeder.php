<?php

use Illuminate\Database\Seeder;

class LocalDevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // ユーザー１名
         \App\Eloquents\User::create([
            'role' => 1,
            'name' => '杉山あかり',
            'email' => 'test@akari.com',
            'password' => bcrypt('password'),
            'remember_token' => \Str::random(10),
        ]);

        
        factory(\App\Eloquents\User::class, 10)->create();
    }
}
