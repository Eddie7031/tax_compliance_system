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
        Schema::create('paye_analyses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('period');

            $table->decimal('payroll_taxable_pay', 15, 2)->default(0);

            $table->decimal('kra_taxable_pay', 15, 2)->default(0);

            $table->decimal('payroll_paye', 15, 2)->default(0);

            $table->decimal('kra_paye', 15, 2)->default(0);

            $table->decimal('variance', 15, 2)->default(0);

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paye_analyses');
    }
};
