<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentables', function (Blueprint $table) {
            $table->integer('document_id')->unsigned();
            $table->integer('documentable_id')->unsigned();
            $table->integer('documentable_type');
            $table->index('document_id','documentable_id','documentable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documentables');
    }
}
