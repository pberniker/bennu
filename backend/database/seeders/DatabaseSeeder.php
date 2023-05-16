<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pablo D. Berniker',
            'username' => 'Berni',
            'email' => 'pablo_berniker@hotmail.com',
            'street' => 'Kulas Light',
            'suite' => 'Apt. 556',
            'city' => 'Gwenborough',
            'zipcode' => '92998-3874',
            'lat' => '-37.3159',
            'lng' => '81.1496',
            'phone' => '1-770-736-8031 x56442',
            'website' => 'hildegard.org',
            'company' => 'Romaguera-Crona',
            'catch_phrase' => 'Multi-layered client-server neural-net',
            'bs' => 'harness real-time e-markets',
            'root' => true,
        ]);
    }
}
