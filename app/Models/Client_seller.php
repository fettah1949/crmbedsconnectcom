<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client_seller extends Authenticatable
{
    use Notifiable;
    protected $guard = 'Client_seller';
    protected $fillable = [

        
        'name',
        'email',
        'password',
        'agency_id',
        
    ];
}
