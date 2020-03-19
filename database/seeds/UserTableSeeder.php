<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'dohuythang';
        $user->email = 'dothang@gmail.com';
        $user->password = Hash::make('thang123');
        $user->phone = '0986141742';
        $user->save();
    }
}
