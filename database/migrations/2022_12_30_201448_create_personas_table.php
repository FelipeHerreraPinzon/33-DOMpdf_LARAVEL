<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodocumento_id')->nullable()->constrained();
            $table->string('persona_numdoc', 20);
            $table->string('persona_nombres', 50);
            $table->string('persona_apellidos', 50);
            $table->string('persona_celular', 20);
            $table->string('persona_telfijo', 20);
            $table->string('persona_email', 40);
            $table->string('persona_codpostal', 20);
            $table->text('persona_direccion');
            $table->foreignId('municipio_id')->nullable()->constrained();
            $table->foreignId('departamento_id')->nullable()->constrained();
            $table->foreignId('contacto_id')->nullable()->constrained();
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
        Schema::dropIfExists('personas');
    }
};
