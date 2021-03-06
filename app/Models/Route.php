<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    static $rules = [
		'user_id' => 'required',
		'driver_id' => 'required',
        'vehicle_id' => 'required'
    ];

    protected $perPage = 20;

    protected $fillable = ['driver_id','vehicle_id','description','active','user_id'];
}
