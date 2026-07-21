<div class="modal fade" id="approvalModal">

<div class="modal-dialog">

<div class="modal-content">


<div class="modal-header bg-primary text-white">

<h5>
Review & Approval
</h5>

<button class="close" data-dismiss="modal">
×
</button>

</div>


<form method="POST"
action="{{ route('paye-analyses.updateApproval',$payeAnalysis->id) }}">


@csrf
@method('PUT')


<div class="modal-body">


<div class="form-group">

<label>Prepared By</label>

<input type="text"
name="prepared_by"
class="form-control"
value="{{ $payeAnalysis->prepared_by }}">

</div>


<div class="form-group">

<label>Prepared Date</label>

<input type="date"
name="prepared_date"
class="form-control"
value="{{ $payeAnalysis->prepared_date }}">

</div>



<hr>


<div class="form-group">

<label>Reviewed By</label>

<input type="text"
name="reviewed_by"
class="form-control"
value="{{ $payeAnalysis->reviewed_by }}">

</div>


<div class="form-group">

<label>Reviewed Date</label>

<input type="date"
name="reviewed_date"
class="form-control"
value="{{ $payeAnalysis->reviewed_date }}">

</div>


<hr>


<div class="form-group">

<label>Approved By</label>

<input type="text"
name="approved_by"
class="form-control"
value="{{ $payeAnalysis->approved_by }}">

</div>


<div class="form-group">

<label>Approved Date</label>

<input type="date"
name="approved_date"
class="form-control"
value="{{ $payeAnalysis->approved_date }}">

</div>



</div>


<div class="modal-footer">

<button type="submit"
class="btn btn-success">

Save

</button>


</div>


</form>


</div>

</div>

</div>
