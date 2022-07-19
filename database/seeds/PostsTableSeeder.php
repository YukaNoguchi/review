<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'point' => 1,
                'comment' => 'test',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 4,
                'product_id' => 4,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 5,
                'product_id' => 5,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'product_id' => 6,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'product_id' => 7,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'product_id' => 8,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'product_id' => 9,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'product_id' => 10,
                'point' => 1,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'product_id' => 8,
                'point' => 4,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'product_id' => 9,
                'point' => 3,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'product_id' => 10,
                'point' => 5,
                'comment' => '口コミ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'point' => 1,
                'comment' => 'test2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'point' => 1,
                'comment' => 'test3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 4,
                'point' => 1,
                'comment' => 'test4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 5,
                'point' => 1,
                'comment' => 'test5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 6,
                'point' => 1,
                'comment' => 'test6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'product_id' => 7,
                'point' => 1,
                'comment' => 'test7',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
