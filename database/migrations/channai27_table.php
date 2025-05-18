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
        Schema::create('channai27', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('');
$table->integer('age', )->comment('')->nullable()->index();
$table->text('role', 20)->comment('');
$table->->timestamp()->('time', )->comment('')->useCurrent();
;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channai27');
    }
};




