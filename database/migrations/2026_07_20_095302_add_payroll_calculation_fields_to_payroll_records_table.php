<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('payroll_records', function ($table) {

        $table->decimal('basic_pay',12,2)
              ->default(0);

        $table->decimal('tax_charge',12,2)
              ->default(0);

        $table->decimal('tax_relief',12,2)
              ->default(0);

        $table->decimal('net_pay',12,2)
              ->default(0);

    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payroll_records', function (Blueprint $table) {
            //
        });
    }
};
