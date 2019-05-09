

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalsignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_sign', function (Blueprint $table) {
            $table->integer('vital_signID');
            $table->integer('patientID');
            $table->integer('signID');
            $table->string('value', 20);
            $table->timestamp('time')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('vital_sign');
    }
}

