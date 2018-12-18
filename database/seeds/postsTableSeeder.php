<?php

use Illuminate\Database\Seeder;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++)
        {
            DB::table('posts')->insert([
                'post_title' => $faker->text(50),
                'author_name'=> $faker->name,
                'description'=>  $faker->text(255),
                'img_path'=> '',
                'created_at' => $faker->date()
            ]);
        }
    }
}
