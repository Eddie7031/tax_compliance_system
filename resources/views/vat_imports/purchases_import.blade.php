@extends('adminlte::page')

@section('title','Import Purchases')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Import Purchase Register</h3>
    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('vat.purchase.import',$vatAnalysis->id) }}"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>Select Excel / CSV File</label>

                <input
                    type="file"
                    name="file"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-success mt-3">

                Import Purchases

            </button>

        </form>

    </div>

</div>

@stop