<?php

use Illuminate\Database\Seeder;

class FirstDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'test_user1',
            'email' => '$2y$10$ChqZfhyBb/9co/afO7olleyw2XAY/9WM6AoNEBxBTs3P1jFw3JUnG',
            'remember_token' => NULL,
        ]);

        DB::table('entries')->insert([
            [
                'user_id' => 1,
                'title' => 'test title1',
                'body' => 'test body1',
                'public' => 1,
                'priority' => 1,
            ],
            [
                'user_id' => 1,
                'title' => 'test title2',
                'body' => 'test body2',
                'public' => 1,
                'priority' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'test title3',
                'body' => 'test body3',
                'public' => 1,
                'priority' => 3,
            ]
        ]);

        DB::table('desings')->insert([
            [
                'user_id' => 1,
                'css' => 'responsive4/style.css',
            ]
        ]);
    }
}
