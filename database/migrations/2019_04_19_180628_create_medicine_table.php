

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->integer('medicineID');
            $table->timestamp('time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->double('quantity');
            $table->integer('medicamentID');
            $table->integer('patientID');
            $table->integer('staffID_nurse');
            $table->integer('staffID_physician');
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
        Schema::dropIfExists('medicine');
    }
}

