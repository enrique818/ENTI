<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('capital_institucional', ['si', 'no'])->nullable()->after('ventas');
            $table->enum('prestamo_financiero', ['si', 'no'])->nullable()->after('capital_institucional');
            $table->enum('equipo', ['1', '5', '10', '50', 'mas'])->nullable()->after('prestamo_financiero');
            $table->integer('tipo_capital')->nullable()->after('equipo');
            $table->enum('experiencia', ['1', '5', '10', 'mas'])->nullable()->after('tipo_capital');
            $table->enum('fundador', ['si', 'no'])->nullable()->after('experiencia');
            $table->integer('formacion')->nullable()->after('fundador');
            $table->integer('engagement')->nullable()->after('formacion');
            $table->enum('seguidores', ['20', '50', '100', '250', 'mas'])->nullable()->after('engagement');
            $table->string('tiktok')->nullable()->after('seguidores');
            $table->dropColumn('contacto');
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
            $table->string('contacto')->nullable()->after('descripcion');
            $table->dropColumn('seguidores');
            $table->dropColumn('engagement');
            $table->dropColumn('formacion');
            $table->dropColumn('fundador');
            $table->dropColumn('experiencia');
            $table->dropColumn('tipo_capital');
            $table->dropColumn('equipo');
            $table->dropColumn('prestamo_financiero');
            $table->dropColumn('capital_institucional');
            $table->dropColumn('tiktok');
        });
    }
}
