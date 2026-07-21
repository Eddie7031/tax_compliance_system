<div class="card">

<div class="card-header bg-dark text-white">

PAYE SUMMARY

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>Payroll Taxable Pay</th>

<td class="text-end">

KES {{ number_format($payeAnalysis->payroll_taxable_pay,2) }}

</td>

</tr>

<tr>

<th>KRA Taxable Pay</th>

<td class="text-end">

KES {{ number_format($payeAnalysis->kra_taxable_pay,2) }}

</td>

</tr>

<tr>

<th>Payroll PAYE</th>

<td class="text-end">

KES {{ number_format($payeAnalysis->payroll_paye,2) }}

</td>

</tr>

<tr>

<th>KRA PAYE</th>

<td class="text-end">

KES {{ number_format($payeAnalysis->kra_paye,2) }}

</td>

</tr>

<tr class="table-warning">

<th>Variance</th>

<td class="text-end">

KES {{ number_format($payeAnalysis->variance,2) }}

</td>

</tr>

</table>

</div>

</div>
