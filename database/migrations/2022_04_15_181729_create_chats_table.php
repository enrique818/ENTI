<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_one_id')->nullable();
            $table->unsignedBigInteger('user_two_id')->nullable();
            $table->foreign('user_one_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('user_two_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign('chats_user_one_id_foreign');
            $table->dropForeign('chats_user_two_id_foreign');
        });
        Schema::dropIfExists('chats');
    }
}
