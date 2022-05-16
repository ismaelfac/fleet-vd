<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/jsons/drivers.json");
        $driver = json_decode($data, true);
        foreach ($driver as $value) {
            Driver::create([
                'user_id' => $value['user_id'],
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'ssn' => $value['ssn'],
                'dob' => $value['dob'],
                'address' => $value['address'],
                'city' => $value['city'],
                'zip' => $value['zip'],
                'phone' => $value['phone'],
                'active' => $value['active'],
                'user_id' => 1
            ]);
        }
    }
}
