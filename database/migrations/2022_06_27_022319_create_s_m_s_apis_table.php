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
        Schema::create('s_m_s_apis', function (Blueprint $table) {
            $table->id();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->string('barcode_number')->nullable();
            $table->string('stock_code')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('unit_price')->nullable();
            // $table->integer('running_total')->nullable();
            // $table->string('remarks_age_gender')->nullable();
            $table->string('total_quantity')->nullable();
            $table->string('brand')->nullable();
            $table->string('outlet')->nullable();
            $table->string('remarks')->nullable();
            // $table->string('full_name')->nullable();
            // $table->string('mobile_number')->nullable();      
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
        Schema::dropIfExists('s_m_s_apis');
    }
};
