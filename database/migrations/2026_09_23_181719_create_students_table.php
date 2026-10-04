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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('phone',100);
            $table->string('address',255);
          $table->tinyInteger('active')->default(1)->comment('Is this course active or disabled?');
$table->foreignId('country_id')->references('id')->on('country')->onDelete('cascade')->onUpdate('cascade');
$table->string('img',150);
$table->string('nots',225);
$table->string("nationalty_id",100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
