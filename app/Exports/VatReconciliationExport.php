<?php

namespace App\Exports;

use App\Models\VatAnalysis;
use App\Models\VatTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VatReconciliationExport implements FromCollection, WithHeadings
{
    protected $vatAnalysis;

    public function __construct(VatAnalysis $vatAnalysis)
    {
        $this->vatAnalysis = $vatAnalysis;
    }

    public function collection()
    {
        return VatTransaction::where(
            'vat_analysis_id',
            $this->vatAnalysis->id
        )
        ->select(
            'transaction_date',
            'invoice_number',
            'supplier_customer',
            'description',
            'transaction_type',
            'amount_before_vat'
        )
        ->orderBy('transaction_date')
        ->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Invoice',
            'Supplier / Customer',
            'Description',
            'Type',
          'amount_before_vat',,
        ];
    }
}