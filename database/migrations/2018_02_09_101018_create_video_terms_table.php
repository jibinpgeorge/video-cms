<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id');
            $table->integer('term_type_id');
            $table->integer('term_id');

            $table->index('term_id');
            $table->index('video_id');
            $table->index('term_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_terms');
    }
}
