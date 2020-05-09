<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('user_name')->comment('用户名');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('phone')->nullable()->comment('手机号');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('password')->nullable()->comment('密码');
            $table->tinyInteger('status')->default(1)->comment('状态：1 正常，2 禁用');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
