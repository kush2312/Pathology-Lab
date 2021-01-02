<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('fields');
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('normal')->nullable();
            $table->string('abnormal')->nullable();
            $table->string('ref_range')->nullable();
            $table->timestamps();
        });

        // Schema::table('fields', function($table){

        //     $table->foreign('test_id')
        //           ->references('id')->on('tests')
        //           ->onDelete('set null');

        // });

        Schema::table('fields', function (Blueprint $table) {
            $table->foreignId('test_id')->constrained('tests')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
