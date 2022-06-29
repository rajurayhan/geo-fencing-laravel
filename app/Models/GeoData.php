<?php

namespace App\Models;

// use App\Traits\Geographical as TraitsGeographical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class GeoData extends Model
{

    use HasFactory, Geographical;

    const LATITUDE  = 'lang';
    const LONGITUDE = 'lat';
    protected static $kilometers = true;
    
    protected $guarded = [];
}
