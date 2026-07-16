<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vat_analyses', function (Blueprint $table) {

            // Add new columns
            $table->string('period')->after('client_id');

            $table->decimal('output_vat',15,2)->default(0)->after('period');
            $table->decimal('input_vat',15,2)->default(0)->after('output_vat');

            $table->decimal('vat_withheld',15,2)->default(0)->after('input_vat');
            $table->decimal('credit_brought_forward',15,2)->default(0)->after('vat_withheld');

            // Remove old columns
            $table->dropColumn([
                'month',
                'year',
                'sales_total',
                'sales_vat',
                'purchase_total',
                'purchase_vat',
                'vat_withholding',
                'credit_bf'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('vat_analyses', function (Blueprint $table) {

            $table->string('month');
            $table->integer('year');

            $table->decimal('sales_total',15,2)->default(0);
            $table->decimal('sales_vat',15,2)->default(0);

            $table->decimal('purchase_total',15,2)->default(0);
            $table->decimal('purchase_vat',15,2)->default(0);

            $table->decimal('vat_withholding',15,2)->default(0);
            $table->decimal('credit_bf',15,2)->default(0);

            $table->dropColumn([
                'period',
                'output_vat',
                'input_vat',
                'vat_withheld',
                'credit_brought_forward'
            ]);
        });
    }
};