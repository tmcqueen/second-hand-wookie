<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->index();
            $table->string('name');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->integer('cost')->default(0);
            $table->integer('user_id')->unsigned()->index();
            $table->integer('donation_id')->unsigned()->index();
            $table->text('description')->nullable();
            $table->integer('default_image_id')->nullable()->unsigned();
            $table->boolean('in_inventory')->default(false);
            $table->softDeletes();
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
        Schema::drop('assets');
    }
}
