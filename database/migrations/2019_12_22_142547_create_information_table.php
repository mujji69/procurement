<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('tender_id');
            $table->integer('upload_id')->nullable();
            $table->string('org_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->date('duration')->nullable();

            $table->string('price')->nullable();
            $table->string('country')->nullable();

            $table->integer('quantity')->nullable();
            $table->text('proposal')->nullable();
            $table->text('terms')->nullable();
            $table->integer('quantity')->default(0);


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
        Schema::dropIfExists('information');
    }
}
