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
    Schema::table('vat_analyses', function (Blueprint $table) {

        $table->date('prepared_date')->nullable();

        $table->date('reviewed_date')->nullable();

        $table->date('approved_date')->nullable();

    });
}

public function down(): void
{
    Schema::table('vat_analyses', function (Blueprint $table) {

        $table->dropColumn([
            'prepared_date',
            'reviewed_date',
            'approved_date'
        ]);

    });
}
};
