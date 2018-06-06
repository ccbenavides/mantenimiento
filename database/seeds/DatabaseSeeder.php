<?php

use Illuminate\Database\Seeder;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'jorge',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('acuario20'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'carlos',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('acuario20')
        ]);
    }
}
