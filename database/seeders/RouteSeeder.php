<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/jsons/routes.json");
        $routes = json_decode($data, true);
        foreach ($routes as $value) {
            Route::create([
                'user_id' => $value['user_id'],
                'driver_id' => $value['driver_id'],
                'vehicle_id' => $value['vehicle_id'],
                'description' => $value['description'],
                'active' => $value['active']
            ]);
        }
    }
}
