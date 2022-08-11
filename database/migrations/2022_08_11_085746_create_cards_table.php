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
        Schema::disableForeignKeyConstraints();
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('pin');
            $table->date('certificate_expiration_date');
            $table->string('machine_name');
            $table->string('password');
            $table->date('last_access_date');
            $table->date('update_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
