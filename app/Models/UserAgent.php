<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $table = 'user_agent';
    protected $primaryKey = 'user_agent_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
         'user_id', 'created','agent_id',
    ];

}