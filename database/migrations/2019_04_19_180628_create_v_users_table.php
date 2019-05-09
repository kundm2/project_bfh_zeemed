

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_users', function (Blueprint $table) {
            $table->integer('staffID')->default('0');
            $table->string('username', 30);
            $table->string('name', 30);
            $table->string('first_name', 30);
            $table->text('pass');
            $table->text('nfc_tag');
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
        Schema::dropIfExists('v_users');
    }
}

