

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocnoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloc_note', function (Blueprint $table) {
            $table->integer('bloc_noteID');
            $table->timestamp('time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('staffID');
            $table->integer('patientID');
            $table->text('note');
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
        Schema::dropIfExists('bloc_note');
    }
}

