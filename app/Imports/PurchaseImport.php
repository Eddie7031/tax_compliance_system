<?php

namespace App\Imports;

use App\Helpers\ColumnMapper;
use App\Models\VatPurchase;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchaseImport implements ToModel, WithHeadingRow
{
    protected $vatAnalysisId;

    public function __construct($vatAnalysisId)
    {
        $this->vatAnalysisId = $vatAnalysisId;
    }

    public function model(array $row)
    {
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

            'invoice'

        ]);

        $invoiceNumber = ltrim((string)$invoiceNumber, '|');

        if (empty($invoiceNumber)) {

            return null;

        }

        /*
        |--------------------------------------------------------------------------
        | Supplier
        |--------------------------------------------------------------------------
        */

        $supplier = ColumnMapper::get($row, [

            'supplier_name',

            'supplier',

            'vendor',

            'seller'

        ]);

        if (empty($supplier)) {

            $supplier = 'Unknown Supplier';

        }

        /*
        |--------------------------------------------------------------------------
        | PIN
        |--------------------------------------------------------------------------
        */

        $kraPin = ColumnMapper::get($row, [

            'kra_pin',

            'pin'

        ]);

        /*
        |--------------------------------------------------------------------------
        | Net Amount
        |--------------------------------------------------------------------------
        */

        $net = ColumnMapper::get($row, [

            'net_amount',

            'taxable_amount',

            'taxable',

            'net'

        ]);

        $net = is_numeric($net) ? $net : 0;

        /*
        |--------------------------------------------------------------------------
        | VAT Amount
        |--------------------------------------------------------------------------
        */

        $vat = ColumnMapper::get($row, [

            'vat_amount',

            'vat'

        ]);

        $vat = is_numeric($vat) ? $vat : ($net * 0.16);

        /*
        |--------------------------------------------------------------------------
        | Total Amount
        |--------------------------------------------------------------------------
        */

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

            $description = 'Imported Purchase';

        }

        return new VatPurchase([

            'vat_analysis_id' => $this->vatAnalysisId,

            'invoice_date' => $date,

            'invoice_number' => $invoiceNumber,

            'supplier_name' => $supplier,

            'kra_pin' => $kraPin,

            'description' => $description,

            'vat_rate' => 16,

            'net_amount' => $net,

            'vat_amount' => $vat,

            'total_amount' => $total,

        ]);
    }
}