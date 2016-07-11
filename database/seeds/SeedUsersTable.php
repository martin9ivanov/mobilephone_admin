<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(
            [
                [
                    'name' => 'Martin Ivanov',
                    'email' => 'mail@martinivanov.info',
                    'password' => Hash::make('root'),
                    'remember_token' => 'Martin Ivanov'
                ],
                [
                    'name' => 'root',
                    'email' => 'test@email.com',
                    'password' => Hash::make('root'),
                    'remember_token' => 'root'
                ],
            ]
        );
    }
}
