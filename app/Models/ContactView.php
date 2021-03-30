<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactView extends Model
{
    protected $table = 'contact_view';
    protected $primaryKey = 'contact_view_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'property_id', 'location','type','created',
    ];

}