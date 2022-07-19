<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('slides')->insert([
            [
                'title' => 'slide_1',
                'image_path' => 'slide_1.png',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'slide_2',
                'image_path' => 'slide_2.png',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'slide_3',
                'image_path' => 'slide_3.png',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'slide_4',
                'image_path' => 'slide_4.png',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

        ]);
    }
}