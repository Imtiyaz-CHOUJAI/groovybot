<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDanceOffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dance_offs', function (Blueprint $table) {
            $table->foreign('first_contender_id')
                ->references('id')
                ->on('robots');
            $table->foreign('second_contender_id')
                ->references('id')
                ->on('robots');
            $table->foreign('winner_id')
                ->references('id')
                ->on('robots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dance_offs', function (Blueprint $table) {
            $table->dropForeign('dance_offs_first_contender_id_foreign');
            $table->dropForeign('dance_offs_second_contender_id_foreign');
            $table->dropForeign('dance_offs_winner_id_foreign');
        });
    }
}
