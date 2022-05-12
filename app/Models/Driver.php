<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    static $rules = [
		'user_id' => 'required',
		'first_name' => 'required',
        'last_name' => 'required'
    ];

    protected $perPage = 20;

    protected $fillable = ['first_name','last_name','ssn','dob','address','city','zip','phone','active','user_id'];
}
