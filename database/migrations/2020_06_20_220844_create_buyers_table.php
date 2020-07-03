<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('people_id');
            $table->foreign('people_id')->references('id')->on('people')
                    ->constrained()
                    ->onDelete('cascade');

            $table->unsignedInteger('no_notebook');
            $table->unsignedInteger('no_registry');
            $table->boolean('has_credit')->default(false);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
