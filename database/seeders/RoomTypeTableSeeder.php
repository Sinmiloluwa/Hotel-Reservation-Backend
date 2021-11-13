<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_type')->insert([
            [
                'id' => 1,
                'name' => 'Regular',
                'max_guest' => '2',
                'desc' => 'A regular room without air conditioning'
            ],

            [
                'id' => 2,
                'name' => 'Suite',
                'max_guest' => '4',
                'desc' => 'An executive suite with state of the art facilities'
            ],

            [
                'id' => 3,
                'name' => 'Double',
                'max_guest' => '3',
                'desc' => 'A room with an air conditioner'
            ]
        ]);
    }
}
