<?php

use App\House;
use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $house = new House();
        $house->name_house = "kck";
        $house->house_type = "ddx";
        $house->room_type = "sskk";
        $house->address = "dsd";
        $house->bed_room_num = 2;
        $house->bath_room_num = 3;
        $house->description = "hah";
        $house->price = 454353;
        $house->user_id = 1;
        $house->status = true;
        $house->save();
    }
}
