<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyLocation extends Model
{
    protected $table = 'property_location';
    protected $primaryKey = 'property_location_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'county_id','nearest_town','neighborhood','latlong','property_id', 'created',
    ];

}