<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregando registros de comentarios, es necesario correr primero el seeder de Articles 

        Comment::truncate();

        $number_articles = Article::all()->count();
        $number_users = User::all()->count();

        $faker = \Faker\Factory::create();

        //Insertamos 50 registros 
        
        for($i=0; $i < 50; $i++ ) {
            Comment::create([
                'id_user' => $faker->numberBetween(1, $number_users),
                'id_article' => $faker->numberBetween(1, $number_articles),
                'body_comment' => $faker->paragraph
            ]);

        }
    }
}
