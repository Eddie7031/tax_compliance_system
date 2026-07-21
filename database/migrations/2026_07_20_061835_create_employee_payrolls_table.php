<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_payrolls', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paye_analysis_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Employee Details
            $table->string('staff_no')->nullable();
            $table->string('employee_name');
            $table->string('kra_pin')->nullable();
            $table->string('id_number')->nullable();
            $table->string('shif_number')->nullable();
            $table->string('nssf_number')->nullable();
            $table->string('phone')->nullable();

            // Payroll
            $table->decimal('basic_pay',15,2)->default(0);

            // Statutory Deductions
            $table->decimal('nssf',15,2)->default(0);
            $table->decimal('shif',15,2)->default(0);
            $table->decimal('housing_levy',15,2)->default(0);

            // PAYE
            $table->decimal('taxable_income',15,2)->default(0);
            $table->decimal('tax_charge',15,2)->default(0);
            $table->decimal('tax_relief',15,2)->default(0);
            $table->decimal('paye_tax',15,2)->default(0);

            // Final
            $table->decimal('net_pay',15,2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_payrolls');
    }
};
