<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'スキンケア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'name' => 'ベースメイク',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 3,
                'name' => 'メイクアップ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 4,
                'name' => 'UVケア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 5,
                'name' => 'ヘアケア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 6,
                'name' => 'ボディケア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 7,
                'name' => '香水 フレグランス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'id' => 8,
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
