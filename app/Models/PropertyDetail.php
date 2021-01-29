<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $table = 'property_detail';
    protected $primaryKey = 'property_detail_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'property_id', 'type','size_acre','size_feet','kms_to_tarmac','soil','access_rd_type','created',
    ];

}