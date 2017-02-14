<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //            $table->string('name');
          DB::table('roles')->insert([
            'name' =>'admin',
        
        ]);
    }
}
