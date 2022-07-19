<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blogs')->insert([
            [
                'user_id' => 1,
                'title' => 'test',
                'contents' => 'test',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'title' => 'いちかブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'title' => 'にのブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 4,
                'title' => 'みくブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 5,
                'title' => 'よつはブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'title' => 'いつきブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'title' => 'まりブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'title' => 'まなブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'title' => 'りなブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'title' => 'あみブログ',
                'contents' => 'ブログ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test2',
                'contents' => 'test2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test3',
                'contents' => 'test3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test4',
                'contents' => 'test4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test5',
                'contents' => 'test5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test6',
                'contents' => 'test6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 1,
                'title' => 'test7',
                'contents' => 'test7',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
