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
        Schema::create('VVVV', function (Blueprint $table) {
            $table->id();
            $table->string('v', 12)->comment('');
$table->text('vv', )->comment('');
$table->integer('vvv', )->comment('');
$table->integer('vvvv', )->comment('');
;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VVVV');
    }
};




