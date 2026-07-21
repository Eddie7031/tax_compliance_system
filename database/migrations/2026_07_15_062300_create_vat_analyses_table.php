<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vat_analyses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('period');

            $table->decimal('output_vat', 15, 2)->default(0);
            $table->decimal('input_vat', 15, 2)->default(0);
            $table->decimal('vat_withheld', 15, 2)->default(0);
            $table->decimal('credit_brought_forward', 15, 2)->default(0);
            $table->decimal('net_vat', 15, 2)->default(0);

            $table->string('prepared_by')->nullable();
            $table->date('prepared_date')->nullable();

            $table->string('reviewed_by')->nullable();
            $table->date('reviewed_date')->nullable();

            $table->string('approved_by')->nullable();
            $table->date('approved_date')->nullable();

            $table->enum('status', [
                'Draft',
                'Reviewed',
                'Approved',
                'Filed'
            ])->default('Draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vat_analyses');
    }
};
