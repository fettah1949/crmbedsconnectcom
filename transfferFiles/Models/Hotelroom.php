<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotelroom extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'Room_Id',
        'Room_Name',
        'Hotel_Code',
        'Hotel_Name',
      
    ];
}
