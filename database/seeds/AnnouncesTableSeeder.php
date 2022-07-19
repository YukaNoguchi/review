<?php

use Illuminate\Database\Seeder;


class AnnouncesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('announces')->insert([
            [
                'title' => 'test',
                'contents' => 'test',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ',
                'contents' => 'お知らせ内容',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-2',
                'contents' => 'お知らせ内容-2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-3',
                'contents' => 'お知らせ内容-3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-4',
                'contents' => 'お知らせ内容-4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-5',
                'contents' => 'お知らせ内容-5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-6',
                'contents' => 'お知らせ内容-6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-7',
                'contents' => 'お知らせ内容-7',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-8',
                'contents' => 'お知らせ内容-8',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'お知らせ-9',
                'contents' => 'お知らせ内容-9',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
