<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    use HasFactory;

    static $rules = [
		'user_id' => 'required',
		'route_id' => 'required',
        'week_num' => 'required'
    ];

    protected $perPage = 20;

    protected $fillable = ['route_id','week_num','from','to','active','user_id'];

    public function Route()
    {
        return $this->belongsTo('App\Models\Route');
    }
}
