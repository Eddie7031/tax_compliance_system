<div class="card mt-4">

<div class="card-header bg-dark text-white">

<strong>Review & Approval</strong>

</div>


<div class="card-body">


<p>
<strong>Prepared By:</strong>

{{ $payeAnalysis->prepared_by ?? '________________' }}

&nbsp;&nbsp;

Sign: ____________________

&nbsp;&nbsp;

Date:

{{ $payeAnalysis->prepared_date
? \Carbon\Carbon::parse($payeAnalysis->prepared_date)->format('d/m/Y')
: '____________' }}

</p>



<p>

<strong>Reviewed By:</strong>

{{ $payeAnalysis->reviewed_by ?? '________________' }}

&nbsp;&nbsp;

Sign: ____________________

&nbsp;&nbsp;

Date:

{{ $payeAnalysis->reviewed_date
? \Carbon\Carbon::parse($payeAnalysis->reviewed_date)->format('d/m/Y')
: '____________' }}

</p>



<p>

<strong>Approved By:</strong>

{{ $payeAnalysis->approved_by ?? '________________' }}

&nbsp;&nbsp;

Sign: ____________________

&nbsp;&nbsp;

Date:

{{ $payeAnalysis->approved_date
? \Carbon\Carbon::parse($payeAnalysis->approved_date)->format('d/m/Y')
: '____________' }}

</p>


</div>

</div>
