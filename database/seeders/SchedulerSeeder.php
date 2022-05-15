<?php

namespace Database\Seeders;

use App\Models\Scheduler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/jsons/schedulers.json");
        $schedulers = json_decode($data, true);
        foreach ($schedulers as $value) {
            Scheduler::create([
                'user_id' => $value['user_id'],
                'route_id' => $value['route_id'],
                'week_num' => $value['week_num'],
                'from' => $value['from'],
                'to' => $value['to'],
                'active' => $value['active'],
                'user_id' => 1
            ]);
        }
    }
}
