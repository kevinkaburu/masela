
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterContact extends Model
{
    protected $table = 'newsletter_contact';
    protected $primaryKey = 'newsletter_contact_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'email', 'created',
    ];

}