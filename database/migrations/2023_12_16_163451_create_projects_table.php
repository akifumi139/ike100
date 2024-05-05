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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unsigned();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('status')->default('実行');
            $table->text('body')->nullable();
            $table->boolean('completed')->default(false);

            $table->string('link')->nullable();

            $table->string('level')->nullable();
            $table->text('hurdle')->nullable();
            $table->text('review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
