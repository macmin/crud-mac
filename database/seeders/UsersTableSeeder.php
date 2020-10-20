<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregando datos de usuarios
   
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = bcrypt('testpass');

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $password
        ]);

        for($i=0; $i < 5 ; $i++ ) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }

    }
}
