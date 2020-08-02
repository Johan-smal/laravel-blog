<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Index return collection of Posts
     *
     * @return void
     */
    public function testIndexReturnsPosts()
    {
        $response = $this->call('GET', 'posts');
        $posts = $response->original->getData()['posts'];
 
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $posts);
    }
}
