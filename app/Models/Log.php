<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Log extends Eloquent
{
    // use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'logs';

    protected $fillable = [
        'name', 'loginDate', 'logoutDate'
    ];
}
