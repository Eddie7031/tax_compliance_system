<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payroll_records', function (Blueprint $table) {

            $table->string('id_number')->nullable()->after('pin');

            $table->string('shif_no')->nullable()->after('id_number');

            $table->string('nssf_no')->nullable()->after('shif_no');

            $table->string('phone_no')->nullable()->after('nssf_no');

            $table->decimal('shif', 12, 2)
                  ->default(0)
                  ->after('nssf');

        });
    }

    public function down(): void
    {
        Schema::table('payroll_records', function (Blueprint $table) {

            $table->dropColumn([
                'id_number',
                'shif_no',
                'nssf_no',
                'phone_no',
                'shif',
            ]);

        });
    }
};
