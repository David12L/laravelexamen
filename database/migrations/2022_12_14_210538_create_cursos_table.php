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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('idcur');
            $table->string('denCur');
            $table->string('HrsCur');
            $table->date('crecur');
            $table->string('plancur');   //S,R,
            $table->integer('tipCur');  //1,2,3
            $table->integer('semcur');  //1-6
            $table->integer('estcur');  //0,1
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
        Schema::dropIfExists('cursos');
    }
};
