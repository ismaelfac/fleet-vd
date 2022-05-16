<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $perPage = 20;

    protected $fillable = ['first_name','last_name','ssn','dob','address','city','zip','phone','active','user_id'];

    public function route()
    {
        return $this->belongsTo('App\Models\Route', 'driver_id', 'id');
    }
}
