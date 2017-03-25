<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpeedTestHistory extends Model
{
    //
    protected $table = "speedtest_history";
    protected $fillable = [
        'sponsor',
        'location',
        'ping',
        'download',
        'upload',
    ];
}
