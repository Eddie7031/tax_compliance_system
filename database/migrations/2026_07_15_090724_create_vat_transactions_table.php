<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vat_transactions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vat_analysis_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('transaction_date');

            $table->string('invoice_number');

            $table->string('supplier_customer');

            $table->string('kra_pin')
                  ->nullable();

            $table->text('description')
                  ->nullable();

            $table->decimal('amount_before_vat', 12, 2);

            $table->decimal('vat_amount', 12, 2);

            $table->decimal('total_amount', 12, 2);


            $table->enum('transaction_type', [
                'Purchase',
                'Sales'
            ]);


            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vat_transactions');
    }

};