<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPollOptionIdColumnToUservotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uservotes', function (Blueprint $table) {
            $table->integer('poll_option_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uservotes', function (Blueprint $table) {
            $table->dropColumn('poll_option_id');
        });
    }
}
