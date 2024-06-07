<?php

// database/migrations/xxxx_xx_xx_create_spare_parts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsTable extends Migration
{
    public function up()
    {
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reference');
            $table->string('supplier');
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spare_parts');
    }
}
