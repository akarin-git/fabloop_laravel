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

        // 投稿にレシピが紐づいている１件
        factory(\App\Eloquents\PostImage::class,3)
        ->create([
            'user_id' => 1,
            'category' => 'handmade',
        ]);
        factory(\App\Eloquents\PostImage::class,3)
        ->create([
            'user_id' => 2,
            'category' => 'craft',
        ]);
        // ->each(function($post){
        //     \App\Eloquents\Favorite::create([
        //         'user_id' => $post->user_id,
        //         'material_one' => '木の板',
        //         'amount_one' => '1m×３m',
        //         'goods_one'=>'ノコギリ',
        //     ]);
        // });


        // user作って投稿を全てつなげる１件
        // factory(\App\Eloquents\User::class,1)
        // ->create([
        //     'name' => 'akari sugiyama',
        // ])
        // ->each(function($post){
        //     factory(\App\Eloquents\PostImage::class,1)
        //     ->create([
        //         'user_id'=> $post->id,
        //     ]);
        // });
        
        

        // お気に入り
        \App\Eloquents\Favorite::create([
            'user_id' => 1,
            'post_id' => 1,
        ]);
        \App\Eloquents\Favorite::create([
            'user_id' => 2,
            'post_id' => 1,
        ]);
        \App\Eloquents\Favorite::create([
            'user_id' => 2,
            'post_id' => 2,
        ]);
        
        
        // factory(\App\Eloquents\User::class, 10)->create();

        \Artisan::call('passport:client --password');
    }
}
