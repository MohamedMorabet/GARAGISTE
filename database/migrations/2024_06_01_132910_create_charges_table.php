<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_id');
            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade');
            $table->string('charge_name');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('charges');
    }
}
