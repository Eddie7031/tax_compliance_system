<?php

namespace App\Http\Controllers;

use App\Models\PayrollSetting;
use Illuminate\Http\Request;

class PayrollSettingController extends Controller
{
    public function edit()
    {
        $setting = PayrollSetting::first();

        if (!$setting) {

            $setting = PayrollSetting::create([
                'nssf_rate' => 6,
                'nssf_ceiling' => 108000,
                'shif_rate' => 2.75,
                'shif_minimum' => 300,
                'housing_levy_rate' => 1.5,
                'personal_relief' => 2400,
            ]);
        }

        return view('payroll_settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = PayrollSetting::first();

        $request->validate([
            'nssf_rate' => 'required|numeric',
            'nssf_ceiling' => 'required|numeric',
            'shif_rate' => 'required|numeric',
            'shif_minimum' => 'required|numeric',
            'housing_levy_rate' => 'required|numeric',
            'personal_relief' => 'required|numeric',
        ]);

        $setting->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Payroll settings updated successfully.');
    }
}
