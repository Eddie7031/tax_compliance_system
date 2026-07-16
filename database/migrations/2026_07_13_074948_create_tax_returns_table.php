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
        Schema::create('tax_returns', function (Blueprint $table) {

            $table->id();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->enum('tax_type', [
                'VAT',
                'PAYE',
                'Income Tax',
                'Corporation Tax',
                'NIL Return'
            ]);

            $table->string('period');

            $table->date('filing_date')
                  ->nullable();

            $table->enum('status', [
                'Pending',
                'Filed',
                'Late'
            ])->default('Pending');

            $table->decimal('tax_amount', 12, 2)
                  ->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_returns');
    }
};