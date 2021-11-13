<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_status')->insert([
            [
                'id' => 1,
                'name' => 'Vacant',
                'desc' => 'This room is not vacant'
            ],

            [
                'id' => 2,
                'name' => 'Occupied',
                'desc' => 'This room is Occupied'
            ]
        ]);
    }
}
