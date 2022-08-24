<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionValueDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_value_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('option_id')
                ->references('id')
                ->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_value_descriptions');
    }
}
