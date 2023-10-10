<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string("name");
            $table->enum("status", ['active', 'non_active'])->default('non_active');
            $table->string("sf_adresse");
            $table->string("sf_name");
            
            $table->string("project_adresse");
            $table->string("contractor_name");
            $table->date("start_date");
            $table->date("end_date");
            $table->date("book_term");
            $table->date("commercial_reg_date");
            $table->date("choice_land");
            $table->double("amount");
            $table->integer("commercial_reg_no");
            $table->integer("bank_account_no");
            $table->integer("project_code");
      
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
        Schema::dropIfExists('projects');
    }
};