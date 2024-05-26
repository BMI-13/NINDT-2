<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V1CarDetailsLog extends Model
{
    use HasFactory;

    protected    $fillable =[
'provider',
'jobid',
'my_uniqueid',
'uniqueid',
'site_url',
'details',
'manufacturer',
'model',
'yom',
'yor',
'mileage',
'amount',
'contact',
'fueltype',
'gear',
'posted_on',
'title',
'options',
'condion',
'location',
'location_group',
'status',
'job_url',
'log'
    ];

    
}
