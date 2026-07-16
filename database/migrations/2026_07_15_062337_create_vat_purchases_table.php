<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vat_purchases', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vat_analysis_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('invoice_date');

            $table->string('invoice_number');

            $table->string('supplier_name');

            $table->string('kra_pin')->nullable();

            $table->text('description')->nullable();

            $table->decimal('vat_rate',5,2)->default(16);

            $table->decimal('net_amount',15,2);

            $table->decimal('vat_amount',15,2);

            $table->decimal('total_amount',15,2);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vat_purchases');
    }
};