<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniqEnvPerPlatform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('environments', function (Blueprint $table) {
            $table->unique(['platform_id', 'slug'], 'uniq_envslug_per_platform');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('environments', function (Blueprint $table) {
          $table->dropUnique('uniq_envslug_per_platform'); 
        });
    }
}
