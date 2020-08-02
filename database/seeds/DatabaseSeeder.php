<?php

use App\User;
use App\Post;
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
        $defaultUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        
        factory(User::class, 5)->create()->each(function($user) {
            $user->posts()->saveMany(factory(Post::class, rand(4, 8))->make());
        });
    }
}
