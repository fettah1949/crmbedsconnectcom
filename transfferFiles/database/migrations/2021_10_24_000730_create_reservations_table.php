<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
           
            $table -> string('tgx') -> primary();
            $table -> string('client')->nullable();
            $table -> string('provider')->nullable();
            $table -> string('providerName')->nullable()->default('---');
            $table -> string('hotelName')->nullable()->default('---');
            $table -> decimal('Commission_bdsc')->nullable();
            $table -> decimal('un_pr_selling_EUR')->nullable();
            $table -> decimal('un_pr_purchasing_EUR')->nullable();
            $table -> decimal('marge')->nullable(); 
            $table -> dateTime('bookingDate')->nullable();
            $table -> date('checkinDate')->nullable();
            $table -> date('checkoutDate')->nullable();
            $table -> dateTime('cancellationDate')->nullable();
            $table -> dateTime('lastActionDate')->nullable();
            $table -> integer('nights_count')->nullable();
            $table -> integer('Booking_Window')->nullable();
            $table -> decimal('price_per_night')->nullable();
            $table -> string('status')->nullable();
            $table -> string('summaryStatus')->nullable();
            $table -> string('internalStatus')->nullable();
            $table -> string('bookingStatus')->nullable();
            $table -> string('invoice_status_seller')->nullable()->default('Due');
            $table -> string('invoice_status_buyer')->nullable()->default('Due');
            $table -> string('invoice_id_seller')->nullable();
            $table -> string('invoice_id_buyer')->nullable();
            $table -> string('Payment_Status')->nullable()->default('Not-Payed');
            $table -> string('mainGuestName')->nullable();
            $table -> string('hotelCode')->nullable();
            $table -> string('clientCode')->nullable();
            $table -> string('providerCode')->nullable();
            $table -> string('accessCodeHX')->nullable();
            $table -> string('hotelProvCodeHX')->nullable();
            $table -> string('sellingPrice_currency')->nullable();
            $table -> decimal('sellingPrice_amount')->nullable();
            $table -> boolean('sellingPrice_binding')->nullable();
            $table -> decimal('sellingPrice_commission')->nullable();
            $table -> string('providerPrice_currency')->nullable();
            $table -> decimal('providerPrice_amount')->nullable();
            $table -> boolean('providerPrice_binding')->nullable();
            $table -> decimal('providerPrice_commission')->nullable();
            $table -> string('quoteSellingPrice_currency')->nullable();
            $table -> decimal('quoteSellingPrice_amount')->nullable();
            $table -> boolean('quoteSellingPrice_binding')->nullable();
            $table -> decimal('quoteSellingPrice_commission')->nullable();
            $table -> string('quoteProviderPrice_currency')->nullable();
            $table -> decimal('quoteProviderPrice_amount')->nullable();
            $table -> boolean('quoteProviderPrice_binding')->nullable();
            $table -> decimal('quoteProviderPrice_commission')->nullable();
            $table -> string('cancellationPrice_currency')->nullable();
            $table -> decimal('cancellationPrice_amount')->nullable();
            $table -> boolean('cancellationPrice_binding')->nullable();
            $table -> decimal('cancellationPrice_commission')->nullable();
            $table -> string('correlationID')->nullable();
            $table -> string('officeCode')->nullable();
            $table -> string('reservationError')->nullable();
            $table -> string('reservationWarnings')->nullable();
            $table -> string('error_code')->nullable();
            $table -> string('error_description')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
