<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paye_reconciliations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paye_analysis_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('employee_pin')->nullable();
            $table->string('employee_name');

            $table->decimal('payroll_taxable_pay',15,2)->default(0);
            $table->decimal('kra_taxable_pay',15,2)->default(0);

            $table->decimal('payroll_paye',15,2)->default(0);
            $table->decimal('kra_paye',15,2)->default(0);

            $table->decimal('taxable_variance',15,2)->default(0);
            $table->decimal('paye_variance',15,2)->default(0);

            $table->enum('status',[
                'Matched',
                'Payroll Only',
                'KRA Only',
                'Different Amount'
            ])->default('Matched');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paye_reconciliations');
    }
};
