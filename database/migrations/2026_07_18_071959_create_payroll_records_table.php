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
        Schema::create('payroll_records', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paye_analysis_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('payroll_date');

            $table->string('employee_number');

            $table->string('employee_name');

            $table->string('pin');

            $table->decimal('gross_salary', 15, 2)->default(0);

            $table->decimal('taxable_pay', 15, 2)->default(0);

            $table->decimal('paye', 15, 2)->default(0);

            $table->decimal('nhif', 15, 2)->default(0);

            $table->decimal('nssf', 15, 2)->default(0);

            $table->decimal('housing_levy', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_records');
    }
};
