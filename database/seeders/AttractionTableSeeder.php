<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attractions')->insert([
            [
                'id' => 1,
                'name' => 'Swimming Pool',
                'desc' => 'State of the art outdoor pool' 
            ],

            [
                'id' => 2,
                'name' => 'Gym',
                'desc' => 'Standard gym and fitness center'
            ]
            
        ]);
    }
}
