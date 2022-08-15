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
        Schema::create('permission_role', function(Blueprint $table){
            $table->foreignId('role_id')
                  ->references('id')
                  ->on('roles')
                  ->constrained()
                  ->onDelete('restrict');
             
            $table->foreignId('permission_id')
                  ->references('id')
                  ->on('permissions')
                  ->constrained()
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
        Schema::dropIfExists('permission_role');
    }
};
