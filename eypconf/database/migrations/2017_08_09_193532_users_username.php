<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersUsername extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
        $table->string('username');
        $table->unique('username', 'username_uniq_index');
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
        $table->dropUnique('username_uniq_index');
        $table->dropColumn('username');
      });
  }
}
