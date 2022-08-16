<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('perfil', ['admin', 'startup', 'firma', 'inversionista', 'expertos', 'mentores', 'influencer'])->default('startup')->after('email');
            $table->string('pais')->after('perfil');
            $table->foreignId('industria_id')->nullable()->after('pais')->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('estado', ['marcha', 'idea'])->nullable()->default('marcha')->after('industria_id');
            $table->string('avatar')->nullable()->after('estado');
            $table->string('descripcion')->nullable()->after('avatar');
            $table->string('contacto')->nullable()->after('descripcion');
            $table->string('twitter')->nullable()->after('contacto');
            $table->string('facebook')->nullable()->after('twitter');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('instagram');
            $table->string('youtube')->nullable()->after('linkedin');
            $table->string('web')->nullable()->after('youtube');
            $table->enum('ventas', ['5', '10', '20', '50', '100', 'mas'])->nullable()->after('web');
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
            $table->dropColumn('ventas');
            $table->dropColumn('web');
            $table->dropColumn('youtube');
            $table->dropColumn('linkedin');
            $table->dropColumn('instagram');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('contacto');
            $table->dropColumn('descripcion');
            $table->dropColumn('avatar');
            $table->dropColumn('estado');
            $table->dropForeign(['industria_id']);
            $table->dropColumn('industria_id');
            $table->dropColumn('pais');
            $table->dropColumn('perfil');
        });
    }
}
