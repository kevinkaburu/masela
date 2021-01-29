<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPaymentTerms extends Model
{
    protected $table = 'property_payment_terms';
    protected $primaryKey = 'property_payment_terms_id';
    public const CREATED_AT = 'created';
    public const UPDATED_AT = 'modified';



    protected $fillable = [
        'property_id','installment','installment_deposit_amount','installment_months','installment_price','inclusive_titledeed_processing', 'created',
    ];

}