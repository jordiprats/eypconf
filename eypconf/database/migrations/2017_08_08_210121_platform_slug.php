<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlatformSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('platforms', function (Blueprint $table) {
            $table->string('slug');
            $table->unique('slug', 'slug_uniq_index');
            $table->unique(['user_id', 'slug'], 'user_slash_platform_slug_is_uniq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platforms', function (Blueprint $table) {
          $table->dropUnique('user_slash_platform_slug_is_uniq');
          $table->dropUnique('slug_uniq_index');
          $table->dropColumn('slug');
        });
    }
}
