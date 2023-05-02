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
        Schema::create('radicados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('numradicado');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('referente_id');
            $table->foreignId('tipoinmueble_id')->nullable()->constrained();
            $table->text('direccion');
            $table->string('barrio', 30);
            $table->string('zona', 30);
            $table->foreignId('municipio_id')->nullable()->constrained();
            $table->foreignId('departamento_id')->nullable()->constrained();
            $table->foreignId('persona_id')->nullable()->constrained();
            $table->Integer('solicitante_id');
            $table->foreignId('contacto_id')->nullable()->constrained();
            $table->double('vrreferente');
            $table->double('honorarios');
            //$table->foreignId('documento_id')->nullable()->constrained();
            $table->timestamps();


          //  $table->Foreign('referente_id')->references('id')->on('personas')->onDelete("cascade");

           // $table->Foreign('solicitante_id')->references('id')->on('personas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radicados');
    }
};
