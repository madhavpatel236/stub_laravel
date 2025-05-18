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
        Schema::create('channai', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('name field')->unique(true);
$table->integer('age', 21)->comment('age field')->nullable();
;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channai');
    }
};




