<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
          $newPost = new Post();
          $newPost->user_id = 1;
          $newPost->title = $faker->sentence();
          $newPost->image_path = $faker->imageUrl();
          $newPost->content = $faker->text(700);
          $newPost->save();
        }
    }
}
