<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyView extends Model
{
    protected $table = 'property_view';
    protected $primaryKey = 'property_view_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'property_id','viewed','views', 'created',
    ];

}