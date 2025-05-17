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
        Schema::create('aqwer', function (Blueprint $table) {
            $table->id();
            $table->string('a', 21)->comment('');
$table->integer('aa', )->comment('');
$table->string('aaa', )->comment('');
$table->integer('aaaa', )->comment('');
;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqwer');
    }
};




