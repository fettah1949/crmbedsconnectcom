<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('Expense_Date')->nullable();
            $table->string('Payment_Mode')->nullable();
            $table->decimal('Amount')->nullable();
            $table->string('Currency')->nullable();
            $table->string('Category')->nullable();
            $table->string('description')->nullable();
            $table->string('Paid_Through')->nullable();
            $table->string('Staf_Name')->nullable();
            $table->string('Transaction_id')->nullable();
            $table->string('Bank_id')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
