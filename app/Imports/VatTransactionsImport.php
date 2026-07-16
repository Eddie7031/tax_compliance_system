<?php

namespace App\Imports;

use App\Models\VatTransaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class VatTransactionsImport implements 
ToModel,
WithHeadingRow,
SkipsEmptyRows
{

    protected $vatAnalysisId;


    public function __construct($vatAnalysisId)
    {
        $this->vatAnalysisId = $vatAnalysisId;
    }



  public function model(array $row)
{

    // Skip empty rows
    if (
        empty($row['transaction_date']) &&
        empty($row['invoice_number']) &&
        empty($row['supplier_customer'])
    ) {
        return null;
    }


    return new VatTransaction([

        'vat_analysis_id' => $this->vatAnalysisId,


        'transaction_date' => $this->convertDate(
            $row['transaction_date'] ?? null
        ),


        'invoice_number' =>
            $row['invoice_number'] ?? null,


        'supplier_customer' =>
            $row['supplier_customer'] ?? null,


        'kra_pin' =>
            $row['kra_pin'] ?? null,


        'description' =>
            $row['description'] ?? null,


        'amount_before_vat' =>
            $row['amount_before_vat'] ?? 0,


        'vat_amount' =>
            $row['vat_amount'] ?? 0,


        'total_amount' =>
            $row['total_amount'] ?? 0,


        'transaction_type' =>
            $row['transaction_type'] ?? 'Purchase',

    ]);

}
private function convertDate($date)
{

    if(empty($date)){
        return null;
    }


    try {

        if(is_numeric($date)){

            return Date::excelToDateTimeObject($date)
                ->format('Y-m-d');

        }


        return date('Y-m-d', strtotime($date));


    } catch(\Exception $e){

        return null;

    }

}
}