<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** access */
            $table->boolean('admin')->nullable();
            $table->boolean('seller')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            /** contact */
            $table->dropColumn('telephone');
            $table->dropColumn('cell');

            /** access */
            $table->dropColumn('admin');
            $table->dropColumn('seller');
        });
    }
}
