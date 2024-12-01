<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('Code_du_compte')->nullable();
            $table->string('Nom_du_compte')->nullable();
            $table->string('Nom_de_la_banque')->nullable();
            $table->string('Devise')->nullable();
            $table->string('Numero_de_compte')->nullable();
            $table->string('SWIFT')->nullable();
            $table->string('Description')->nullable();
            $table->decimal('Balance')->default(0);
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
        Schema::dropIfExists('banks');
    }
}
