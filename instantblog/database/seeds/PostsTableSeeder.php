<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        Post::create([
            'id' => '1',
            'user_id' => '1',
            'post_desc' => 'Hello World! This is the first post.',
            'post_title' => 'Hello World',
            'post_slug' => 'hello-world',
            'post_media' => 'hello-world.png',
            'post_color' => 'bg-dark',
            'post_instant' => '1'
        ]);
    }
}
