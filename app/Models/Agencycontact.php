<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencycontact extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'Agency_ID',
        'VAT_ID',
        'Agency_Name',
        'First_Name',
        'Last_Name',
        'Email',
        'Email2',
        'Email3',
        'Phone',
        'Mobile',
        'Emergency_Phone',
        'Payment_Terms',
        'Billing_Address',
        'Billing_City',
        'Billing_State',
        'Billing_Country',
        'ZIP_code',
        'Booking_Manager',
        'Booking_Manager_email',
        'Booking_Manager_Phone',
        'Support_Email',
        'Support_Email_2',
        'Support_Email_3',
        'Support_Email_4',
        'Financial_Manager',
        'Financial_Manager_email',
        'Financial_Manager_email2',
        'Financial_Manager_email3',
        'Financial_Manager_email4',
        'Financial_Manager_Phone',
        'Notes',
        'Contact_Type',
        'First_Name_1',
        'Last_Name_1',
        'Email_1',
        'Email2_1',
        'Phone_1',
        'Mobile_1',
        'ZohoID',
      
    ];
}
