<?php

namespace App\Imports;

use App\Helpers\ColumnMapper;
use App\Models\VatSale;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesImport implements ToModel, WithHeadingRow
{
    protected $vatAnalysisId;

    public function __construct($vatAnalysisId)
    {
        $this->vatAnalysisId = $vatAnalysisId;
    }

    public function model(array $row)
    {
        // Uncomment this only for debugging
        // dd($row);

        /*
        |--------------------------------------------------------------------------
        | Invoice Date
        |--------------------------------------------------------------------------
        */

        $date = ColumnMapper::get($row, [
            'invoice_date',
            'date'
        ]);

        if (is_numeric($date)) {

            $date = Carbon::instance(
                ExcelDate::excelToDateTimeObject($date)
            )->format('Y-m-d');

        } elseif (!empty($date)) {

            try {

                $date = Carbon::createFromFormat(
                    'd/m/Y',
                    trim($date)
                )->format('Y-m-d');

            } catch (\Exception $e) {

                try {

                    $date = Carbon::parse($date)
                        ->format('Y-m-d');

                } catch (\Exception $e) {

                    $date = null;

                }

            }

        }

        /*
        |--------------------------------------------------------------------------
        | Invoice Number
        |--------------------------------------------------------------------------
        */

        $invoiceNumber = ColumnMapper::get($row, [
            'invoice_no',
            'invoice_number',
            'invoice number',
            'invoice no',
            'invoice'
        ]);

        $invoiceNumber = ltrim((string) $invoiceNumber, '|');

        if (empty($invoiceNumber)) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Customer Name
        |--------------------------------------------------------------------------
        */

        $customerName = ColumnMapper::get($row, [
            'purchaser_name',
            'customer_name',
            'customer',
            'client'
        ]);

        if (empty($customerName)) {
            $customerName = 'Unknown Customer';
        }

        /*
        |--------------------------------------------------------------------------
        | KRA PIN
        |--------------------------------------------------------------------------
        */

        $kraPin = ColumnMapper::get($row, [
            'purchaser_pin',
            'kra_pin',
            'pin'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Net Amount
        |--------------------------------------------------------------------------
        */

        $net = ColumnMapper::get($row, [
            'taxable_amt',
            'net_amount',
            'net',
            'taxable',
            'taxable_value'
        ]);

        $net = is_numeric($net) ? $net : 0;

        /*
        |--------------------------------------------------------------------------
        | VAT Amount
        |--------------------------------------------------------------------------
        */

        $vat = ColumnMapper::get($row, [
            'vat_amount',
            'vat_amt',
            'vat',
            'tax'
        ]);

        if (!is_numeric($vat)) {
            $vat = round($net * 0.16, 2);
        }

        /*
        |--------------------------------------------------------------------------
        | Total Amount
        |--------------------------------------------------------------------------
        */
$vat = ColumnMapper::get($row, [
    'vat_amount',
    'vat',
    'tax_amount',
    'tax'
]);

$vat = is_numeric($vat) ? $vat : ($net * 0.16);
        $total = ColumnMapper::get($row, [
            'total_amount',
            'gross_amount',
            'gross',
            'amount'
        ]);

        if (!is_numeric($total)) {
            $total = $net + $vat;
        }

        /*
        |--------------------------------------------------------------------------
        | Description
        |--------------------------------------------------------------------------
        */

        $description = ColumnMapper::get($row, [
            'description',
            'details'
        ]);

        if (empty($description)) {
            $description = 'Imported from KRA eTIMS';
        }

        return new VatSale([

            'vat_analysis_id' => $this->vatAnalysisId,

        'invoice_date' => $date ?? now()->format('Y-m-d'),

            'invoice_number' => $invoiceNumber,

            'customer_name' => $customerName,

            'kra_pin' => $kraPin,

            'description' => $description,

            'vat_rate' => 16,

            'net_amount' => $net,

            'vat_amount' => $vat,

            'total_amount' => $total,

        ]);
    }
}