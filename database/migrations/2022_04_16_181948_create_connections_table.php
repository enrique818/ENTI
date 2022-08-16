<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender')->nullable();
            $table->unsignedBigInteger('receiver')->nullable();
            $table->foreign('sender')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('receiver')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->enum('status', ['pendiente', 'aceptado', 'rechazado']);
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
        Schema::table('connections', function (Blueprint $table) {
            $table->dropForeign('connections_sender_foreign');
            $table->dropForeign('connections_receiver_foreign');
        });
        Schema::dropIfExists('connections');
    }
}
