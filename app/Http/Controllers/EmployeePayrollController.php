<?php

namespace App\Http\Controllers;

use App\Models\EmployeePayroll;
use App\Models\PayeAnalysis;
use Illuminate\Http\Request;

class EmployeePayrollController extends Controller
{
  public function index(PayeAnalysis $payeAnalysis)
{
    $rows = $payeAnalysis->employeePayrolls()
        ->latest()
        ->get()
        ->map(function ($row) {

            return [
                'id'              => $row->id,
                'staff_no'        => $row->staff_no,
                'employee_name'   => $row->employee_name,
                'basic_pay'       => number_format($row->basic_pay, 2),
                'nssf'            => number_format($row->nssf, 2),
                'shif'            => number_format($row->shif, 2),
                'housing_levy'    => number_format($row->housing_levy, 2),
                'paye_tax'        => number_format($row->paye_tax, 2),
                'net_pay'         => number_format($row->net_pay, 2),
                'action'          => '
                    <button class="btn btn-sm btn-primary editPayroll"
                        data-id="'.$row->id.'">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger deletePayroll"
                        data-id="'.$row->id.'">
                        <i class="fas fa-trash"></i>
                    </button>
                ',
            ];

        });

    return response()->json([
        'data' => $rows
    ]);
}
    public function store(Request $request, PayeAnalysis $payeAnalysis)
    {
        $validated = $request->validate([

            'staff_no' => 'nullable|string|max:255',

            'employee_name' => 'required|string|max:255',

            'kra_pin' => 'nullable|string|max:255',

            'id_number' => 'nullable|string|max:255',

            'shif_number' => 'nullable|string|max:255',

            'nssf_number' => 'nullable|string|max:255',

            'phone' => 'nullable|string|max:255',

            'basic_pay' => 'required|numeric',

            'nssf' => 'required|numeric',

            'shif' => 'required|numeric',

            'housing_levy' => 'required|numeric',

            'taxable_income' => 'required|numeric',

            'tax_charge' => 'required|numeric',

            'tax_relief' => 'required|numeric',

            'paye_tax' => 'required|numeric',

            'net_pay' => 'required|numeric',

        ]);

        $validated['paye_analysis_id'] = $payeAnalysis->id;

        $payroll = EmployeePayroll::create($validated);

        return response()->json([

            'success' => true,

            'message' => 'Employee payroll saved successfully.',

            'data' => $payroll

        ]);
    }
}
