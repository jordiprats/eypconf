<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlugNodes extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('nodes', function (Blueprint $table) {
      $table->string('slug');
      $table->unique(['platform_id', 'slug'], 'uniq_nodeslug_per_platform');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('nodes', function (Blueprint $table) {
      $table->dropUnique('uniq_nodeslug_per_platform');
      $table->dropColumn('slug');
    });
  }
}
