<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('favorites')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 4,
                'product_id' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 5,
                'product_id' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'product_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'product_id' => 7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'product_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'product_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'product_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
