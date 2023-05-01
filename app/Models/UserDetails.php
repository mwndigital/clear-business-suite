<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'language',
        'address_line_one',
        'address_line_two',
        'state_region',
        'zip_postcode',
        'town_city',
        'country',
        'phone_number',
        'default_payment_method',
        'default_currency',
        'default_currency_symbol',
        'website',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
