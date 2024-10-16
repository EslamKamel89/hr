<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('abbr', 50);
            $table->string('dlh', 50);
            $table->string('taxid');
            $table->Integer('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('countries');
            $table->Integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('companies');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->date('establish_date');
            $table->tinyInteger('isgroup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};
