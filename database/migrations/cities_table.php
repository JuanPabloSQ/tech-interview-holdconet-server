<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        
        Schema::create('cities', function (Blueprint $table) {

            $table->id();  
            $table->string('name');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {

        Schema::dropIfExists('cities');
    }
};
