<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create and store some locations
        DB::table('locations')->delete();

        $locations = [
            ['id' => 1, 'name' => 'Cisco', 'size' => 500],
            ['id' => 2, 'name' => 'Intel', 'size' => 700],
            ];
        DB::table('locations')->insert($locations);
    }
}
