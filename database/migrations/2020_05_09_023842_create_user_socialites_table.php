<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_socialites', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->comment('用户ID');
            $table->string('oauth_type', 50)->comment('oauth 类型');
            $table->string('oauth_id', 150)->unique()->comment('oauth ID');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_socialites');
    }
}
