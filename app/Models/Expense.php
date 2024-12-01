<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'Expense_Date',
        'Payment_Mode',
        'Amount',
        'Currency',
        'Category',
        'description',
        'Paid_Through',
        'Staf_Name',
        'Transaction_id',
        'Bank_id',
      
    ];
}
