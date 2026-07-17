<?php

namespace App\Exports;

use App\Models\VatAnalysis;
use Illuminate\Support\Collection;
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
        $rows = collect();

        foreach ($this->vatAnalysis->sales as $sale) {

            $rows->push([

                $sale->invoice_date,

                $sale->invoice_number,

                $sale->customer_name,

                $sale->description,

                'Sales',

                $sale->net_amount,

                $sale->vat_amount,

                $sale->total_amount

            ]);

        }

        foreach ($this->vatAnalysis->purchases as $purchase) {

            $rows->push([

                $purchase->invoice_date,

                $purchase->invoice_number,

                $purchase->supplier_name,

                $purchase->description,

                'Purchase',

                $purchase->net_amount,

                $purchase->vat_amount,

                $purchase->total_amount

            ]);

        }

        return $rows;
    }

    public function headings(): array
    {
        return [

            'Date',

            'Invoice',

            'Customer / Supplier',

            'Description',

            'Type',

            'Taxable Amount',

            'VAT',

            'Total Amount'

        ];
    }
}