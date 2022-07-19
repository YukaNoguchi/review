<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert([
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '田中',
                'email' => 'tanaka@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '中村',
                'email' => 'nakamura@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '沢村',
                'email' => 'sawamura@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '降谷',
                'email' => 'furuya@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '大倉',
                'email' => 'okura@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '佐藤',
                'email' => 'sato@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '高橋',
                'email' => 'takahashi@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '森田',
                'email' => 'morita@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '新垣',
                'email' => 'aragaki@gmail.com',
                'password' => Hash::make('testtest'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
