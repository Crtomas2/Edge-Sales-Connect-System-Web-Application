<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_tables', function (Blueprint $table) {
            $table->id();
            $table->string('item_number')->nullable();
            $table->string('barcode_number')->nullable();
            $table->string('description')->nullable();
            $table->string('item_division')->nullable();
            $table->string('size_code')->nullable();
            $table->string('color_code')->nullable();
            $table->string('variant_code')->nullable();
            $table->string('unit_measure')->nullable();
            $table->string('barcode_class')->nullable();
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
        Schema::dropIfExists('new_tables');
    }
};
