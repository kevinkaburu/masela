<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatorUser extends Model
{
    protected $table = 'operator_user';
    protected $primaryKey = 'operator_user_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'operator_id', 'user_id', 'created','role','status',
    ];

}