<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'default_language',
        'address_line_one',
        'address_line_two',
        'town_city',
        'state_region',
        'zip_postcode',
        'country',
        'phone_number',
        'default_payment_method',
        'default_currency',
        'default_currency_symbol',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
