<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_validations')->insert([
            'nip' => '123456789101112131'
        ]);

        DB::table('users')->insert([
            'username' => 'bonbon',
            'nama' => 'bon',
            'nip' => '123456789101112131',
            'email' => 'bon@bon.bon',
            'password' => bcrypt('bonbon'),
            'user_lokasi' => 7,
            'user_role' => 1
        ]);
    }
}
