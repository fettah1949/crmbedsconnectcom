<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotellist extends Model
{
    use HasFactory;
      
    protected $fillable = [
        
        'Hotel_Code',
        'bdc_id',
        'Giata_id',
        'provider_id',
        'Hotel_Name',
        'Latitude',
        'Longitude',
        'Address',
        'City',
        'Zip_Code',
        'Email',
        'Country',
        'Country_Code',
        'provider',
      
    ];
}
