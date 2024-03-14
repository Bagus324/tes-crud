<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activities_name',
        'activities_order',
        'activities_end_time',
        'activities_status',
        'activities_date',
    ];
}
