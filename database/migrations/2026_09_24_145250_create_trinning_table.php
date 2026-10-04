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
        Schema::create('trinning', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->references('id')->on('courses')->onUpdate('cascade');
            $table->date('start_date')->comment('تاريخ بدداية التدريب');
            $table->date('end_date')->comment('تاريخ انتهاء التدريب');
            $table->decimal('price',10,2);
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trinning');
    }
};
