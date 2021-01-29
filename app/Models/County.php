<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'county';
    protected $primaryKey = 'county_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'name', 'created',
    ];

}