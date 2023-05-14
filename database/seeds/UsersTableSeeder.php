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
            'name' => '管理者',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
