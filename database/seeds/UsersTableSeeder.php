<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'いちか',
                'email' => 'ichika@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'にの',
                'email' => 'nino@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'みく',
                'email' => 'miku@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'よつは',
                'email' => 'yotsuha@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'いつき',
                'email' => 'itsuki@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'まり',
                'email' => 'mari@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'まな',
                'email' => 'mana@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'りな',
                'email' => 'rina@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'あみ',
                'email' => 'ami@gmail.com',
                'password' => Hash::make('testtest'),
                'birthday' => '19000101',
                'gender' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
