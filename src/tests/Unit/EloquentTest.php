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
    // pub
    
      /**
     * @test
     */
    // public function POSTIDを指定して投稿者取得()
    // {
    //     $post = \App\Eloquents\PostImage::find(1);

    //     $relation = $post->user;
    //     dd($relation);

    //     $this->assertTrue(true);
    // }

      /**
     * @test
     */
    // public function UserIDを指定して投稿を取得()
    // {
    //     $user = \App\Eloquents\User::find(1);

    //     $relation = $user->post_image;
    //     dd($relation);

    //     $this->assertTrue(true);
    // }

      /**
     * @test
     */
    public function RecipeIDを指定して投稿を取得()
    {
        $recipe = \App\Eloquents\Recipe::find(1);

        $relation = $recipe->post_image;
        dd($relation);

        $this->assertTrue(true);
    }
}
