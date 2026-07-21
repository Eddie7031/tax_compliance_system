<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payroll_settings', function (Blueprint $table) {

            $table->decimal('nssf_rate',5,2)->default(6.00);
            $table->decimal('nssf_ceiling',12,2)->default(108000);

            $table->decimal('shif_rate',5,2)->default(2.75);
            $table->decimal('shif_minimum',12,2)->default(300);

            $table->decimal('housing_levy_rate',5,2)->default(1.50);

            $table->decimal('personal_relief',12,2)->default(2400);
        });
    }

    public function down(): void
    {
        Schema::table('payroll_settings', function (Blueprint $table) {

            $table->dropColumn([
                'nssf_rate',
                'nssf_ceiling',
                'shif_rate',
                'shif_minimum',
                'housing_levy_rate',
                'personal_relief',
            ]);
        });
    }
};
