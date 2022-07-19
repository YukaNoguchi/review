<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('follows')->insert([
            [
                'following_id' => 1,
                'followed_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 2,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 3,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 4,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 5,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 6,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 7,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 8,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 9,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'following_id' => 10,
                'followed_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}