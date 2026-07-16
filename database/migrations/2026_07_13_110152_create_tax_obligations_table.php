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
    Schema::create('tax_obligations', function (Blueprint $table) {

        $table->id();

        $table->foreignId('client_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->enum('tax_type', [
            'VAT',
            'PAYE',
            'Income Tax',
            'Withholding Tax',
            'Turnover Tax',
            'Rental Income Tax',
            'Digital Service Tax',
            'Excise Duty',
            'Capital Gains Tax',
            'Stamp Duty'
        ]);

        $table->enum('frequency', [
            'Monthly',
            'Quarterly',
            'Annual'
        ]);

        $table->date('effective_date');

        $table->date('next_due_date');

        $table->date('last_filed_date')->nullable();

        $table->enum('status', [
            'Active',
            'Inactive'
        ])->default('Active');

        $table->text('remarks')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_obligations');
    }
};
