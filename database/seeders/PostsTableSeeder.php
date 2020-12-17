<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //il faker riempie le tabelle di dati falsi
        //attraverso il comando php artisan seed
        $faker = Factory::create('it-IT');
        $post = new Post([
            'title' => $faker->sentence(),
            'content' => $faker->paragraphs(10,true),
            'slug' => $faker->slug(),
            'user_id' => '1',
        ]);
        $post->save();
        $post->categories()->sync('id');

    }
}
