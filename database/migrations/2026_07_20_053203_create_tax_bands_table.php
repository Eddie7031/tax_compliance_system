<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tax_bands', function (Blueprint $table) {

            $table->id();

            $table->decimal('from_amount',12,2);

            $table->decimal('to_amount',12,2);

            $table->decimal('rate',5,2);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tax_bands');
    }
};
