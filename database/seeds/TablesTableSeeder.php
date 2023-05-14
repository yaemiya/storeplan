<?php

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
            'id' => '1',
            'type' =>'カウンタ',
            'min_ppl' => 1,
            'max_ppl' => 2,
        ],
            [
            'id' => '2',
            'type' =>'カウンタ',
            'min_ppl' => 1,
            'max_ppl' => 2,
        ],
            [
            'id' => '3',
            'type' =>'カウンタ',
            'min_ppl' => 1,
            'max_ppl' => 2,
        ],
            [
            'id' => '4',
            'type' =>'カウンタ',
            'min_ppl' => 1,
            'max_ppl' => 2,
        ],
            [
            'id' => '5',
            'type' =>'テーブル',
            'min_ppl' => 1,
            'max_ppl' => 2,
        ],
            [
            'id' => '6',
            'type' =>'テーブル',
            'min_ppl' => 2,
            'max_ppl' => 4,
        ],
            [
            'id' => '7',
            'type' =>'テーブル',
            'min_ppl' => 2,
            'max_ppl' => 4,
        ],
            [
            'id' => '8',
            'type' =>'テーブル',
            'min_ppl' => 2,
            'max_ppl' => 4,
        ],
            [
            'id' => '9',
            'type' =>'テーブル',
            'min_ppl' => 3,
            'max_ppl' => 7,
        ],
            [
            'id' => '10',
            'type' =>'テーブル',
            'min_ppl' => 3,
            'max_ppl' => 7,
        ],
            [
            'id' => '11',
            'type' =>'テーブル',
            'min_ppl' => 4,
            'max_ppl' => 10,
        ],
        ]);
    }
}
