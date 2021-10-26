<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'str_address' => 'No 5, capricorn road',
            'state' => 'Oyo',
            'zipcode' =>'234567',
            'birthday' => '2002-02-19',
            'contact_number' => '08080455426',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')

        ]);
    }
}
