<?php

namespace App\Services;

class PayrollCalculator
{
    /**
     * Calculate employee payroll.
     */
    public function calculate(float $basicPay): array
    {
// NSSF
// Pensionable earnings capped at KES 108,000
$pensionablePay = min($basicPay, 108000);
$nssf = $pensionablePay * 0.06;

// SHIF (2.75% with minimum KES 300)
$shif = max($basicPay * 0.0275, 300);

// Housing Levy (1.5%)
$housingLevy = $basicPay * 0.015;


        // Taxable Income
        $taxableIncome = max(
            $basicPay - $nssf - $shif - $housingLevy,
            0
        );

        // Gross PAYE
        $taxCharge = $this->calculatePAYE($taxableIncome);

        // Personal Relief
        $taxRelief = 2400;

        // PAYE after relief
        $payeTax = max(
            $taxCharge - $taxRelief,
            0
        );

        // Net Pay
        $netPay = $basicPay
            - $nssf
            - $shif
            - $housingLevy
            - $payeTax;

        return [
            'basic_pay'        => round($basicPay, 2),
            'nssf'             => round($nssf, 2),
            'shif'             => round($shif, 2),
            'housing_levy'     => round($housingLevy, 2),
            'taxable_income'   => round($taxableIncome, 2),
            'tax_charge'       => round($taxCharge, 2),
            'tax_relief'       => round($taxRelief, 2),
            'paye_tax'         => round($payeTax, 2),
            'net_pay'          => round($netPay, 2),
        ];
    }

    /**
     * Calculate PAYE using Kenya tax bands.
     */
    protected function calculatePAYE(float $taxableIncome): float
    {
        $tax = 0;

        if ($taxableIncome <= 24000) {

            $tax = $taxableIncome * 0.10;

        } elseif ($taxableIncome <= 32333) {

            $tax =
                (24000 * 0.10)
                + (($taxableIncome - 24000) * 0.25);

        } elseif ($taxableIncome <= 500000) {

            $tax =
                (24000 * 0.10)
                + (8333 * 0.25)
                + (($taxableIncome - 32333) * 0.30);

        } elseif ($taxableIncome <= 800000) {

            $tax =
                (24000 * 0.10)
                + (8333 * 0.25)
                + ((500000 - 32333) * 0.30)
                + (($taxableIncome - 500000) * 0.325);

        } else {

            $tax =
                (24000 * 0.10)
                + (8333 * 0.25)
                + ((500000 - 32333) * 0.30)
                + (300000 * 0.325)
                + (($taxableIncome - 800000) * 0.35);

        }

        return $tax;
    }
}
