<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregando datos para articulos con usuario 1 y ruta de foto definida por default

        //Article::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i < 20 ; $i++ ) {
            Article::create([
                'title' => $faker->sentence,
                'id_user' => '1', 
                'body_article' => $faker->paragraph,
                'url_foto' => '/url/ruta.jpg'
            ]);
        }
    }
}
