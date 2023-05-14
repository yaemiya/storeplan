<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
            'id' => '1',
            'name' =>'焼鳥三昧コース',
            'amount' => 3000,
            ],
            [
            'id' => '2',
            'name' =>'串カツフルコース',
            'amount' => 4000,
            ],
            [
            'id' => '3',
            'name' =>'お刺身舟盛コース',
            'amount' => 5000,
            ],
         ]);
    }
}
