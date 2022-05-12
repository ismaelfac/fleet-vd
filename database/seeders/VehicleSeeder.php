<?php

namespace Database\Seeders;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/jsons/vehicles.json");
        $vehicles = json_decode($data, true);
        foreach ($vehicles as $value) {
            Vehicle::create([
                'user_id' => $value['user_id'],
                'description' => $value['description'],
                'year' => $value['year'],
                'make' => $value['make'],
                'capacity' => $value['capacity'],
                'active' => $value['active']
            ]);
        }
    }
}
