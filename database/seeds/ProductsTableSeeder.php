<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //データ挿入
        \DB::table('products')->insert([
            [
                'name' => 'test',
                'brand' => 'test',
                'category' => 1,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'test',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '化粧水',
                'brand' => 'BRAND',
                'category' => 1,
                'category_2' => 8,
                'price' => 1000,
                'detail' => '化粧水',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'CCクリーム',
                'brand' => 'BRAND',
                'category' => 2,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'CCクリーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'アイシャドウ',
                'brand' => 'BRAND',
                'category' => 3,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'アイシャドウ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '日焼け止め',
                'brand' => 'BRAND',
                'category' => 4,
                'category_2' => 8,
                'price' => 1000,
                'detail' => '日焼け止め',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ヘアオイル',
                'brand' => 'BRAND',
                'category' => 5,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'ヘアオイル',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ボディミルク',
                'brand' => 'BRAND',
                'category' => 6,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'ボディミルク',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'フレグランス',
                'brand' => 'BRAND',
                'category' => 7,
                'category_2' => 8,
                'price' => 1000,
                'detail' => 'フレグランス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ネイルクリーム',
                'brand' => 'BRAND',
                'category' => 8,
                'category_2' => null,
                'price' => 1000,
                'detail' => 'ネイルクリーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ポリッシュ',
                'brand' => 'BRAND',
                'category' => 8,
                'category_2' => null,
                'price' => 1000,
                'detail' => 'ポリッシュ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
