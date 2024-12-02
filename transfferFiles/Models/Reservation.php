<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey = 'tgx';
    public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'hotelName',
        'mainGuestName',
        'providerName',
        'bookingDate',
        'checkinDate',
        'checkoutDate',
        'status',
        'cancellationDate',
        'cancellationPrice_amount',
        'providerPrice_currency',
        'providerPrice_amount',
        'sellingPrice_currency',
        'sellingPrice_amount',
        'un_pr_selling_EUR',
        'un_pr_purchasing_EUR',
        'invoice_id_seller',
        'invoice_status_seller',
        'invoice_id_buyer',
        'invoice_status_buyer',
        'Payment_Status',
        'marge',
        'Commission_bdsc',
        'price_per_night',

      
    ];
}
