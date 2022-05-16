<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $perPage = 20;

    protected $fillable = ['description','year','make','capacity','active','user_id'];

    public function route()
    {
        return $this->belongsTo('App\Models\Route', 'vehicle_id', 'id');
    }
}
