<?php

use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create and store some devices
        DB::table('devices')->delete();

        $devices = [
            ['id' => 1, 'vendor' => 'HP', 'model' => 'ProLiant', 'year' => '2015', 'borrowed' => true, 'location_id' => 1],
            ['id' => 2, 'vendor' => 'HP', 'model' => 'ProLiant', 'year' => '2015', 'borrowed' => true, 'location_id' => 1],
            ['id' => 3, 'vendor' => 'Nikon', 'model' => 'D50', 'year' => '2010', 'borrowed' => true, 'location_id' => 2],
            ['id' => 4, 'vendor' => 'Nikon', 'model' => 'D50', 'year' => '2011', 'borrowed' => true, 'location_id' => 2],
            ['id' => 5, 'vendor' => 'Nikon', 'model' => 'D50', 'year' => '2012', 'borrowed' => true, 'location_id' => 2],
        ];
        DB::table('devices')->insert($devices);
    }
}
