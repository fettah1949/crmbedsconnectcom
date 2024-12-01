<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencycontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencycontacts', function (Blueprint $table) {
            
            $table->id();
            $table->string('Agency_ID')->unique();
            $table->string('VAT_ID')->nullable();
            $table->string('Agency_Name')->nullable();
            $table->string('First_Name')->nullable();
            $table->string('Last_Name')->nullable();
            $table->string('Email')->nullable();
            $table->string('Email2')->nullable();
            $table->string('Email3')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('Emergency_Phone')->nullable();
            $table->string('Payment_Terms')->nullable();
            $table->string('Billing_Address')->nullable();
            $table->string('Billing_City')->nullable();
            $table->string('Billing_State')->nullable();
            $table->string('Billing_Country')->nullable();
            $table->string('ZIP_code')->nullable();
            $table->string('Booking_Manager')->nullable();
            $table->string('Booking_Manager_email')->nullable();
            $table->string('Booking_Manager_Phone')->nullable();
            $table->string('Support_Email')->nullable();
            $table->string('Support_Email_2')->nullable();
            $table->string('Support_Email_3')->nullable();
            $table->string('Support_Email_4')->nullable();
            $table->string('Financial_Manager')->nullable();
            $table->string('Financial_Manager_email')->nullable();
            $table->string('Financial_Manager_email2')->nullable();
            $table->string('Financial_Manager_email3')->nullable();
            $table->string('Financial_Manager_email4')->nullable();
            $table->string('Financial_Manager_Phone')->nullable();
            $table->string('Notes')->nullable();
            $table->string('Contact_Type')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencycontacts');
    }
}
