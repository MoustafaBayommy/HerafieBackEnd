<?php

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
               DB::table('users')->insert([
                   'role'=>1,
            'name' => 'admin',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
