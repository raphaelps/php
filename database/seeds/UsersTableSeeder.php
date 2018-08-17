<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name'=> 'Raphael Pinheiro',
            'email' => 'raphaelps@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
