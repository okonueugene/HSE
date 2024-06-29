<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_o_r_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignor_id')->constrained('users')->onDelete('cascade');
            $table->string('action_owner');
            $table->foreignId('type_id')->constrained('sor_types')->onDelete('cascade');
            $table->text('observation')->nullable();
            $table->boolean('status')->default(0);
            $table->json('steps_taken')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('s_o_r_s');
    }
};