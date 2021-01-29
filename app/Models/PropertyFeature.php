<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $table = 'property_feature';
    protected $primaryKey = 'property_feature_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'property_id','gated_community','controlled_development','ready_title','electricity','water', 'created',
    ];

}