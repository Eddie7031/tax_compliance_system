@extends('adminlte::page')

@section('title', 'Import Sales Register')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-success text-white">
            <h3>Import Sales Register</h3>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('vat.sales.import', $vatAnalysis->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Select Excel/CSV File</label>

                    <input
                        type="file"
                        name="file"
                        class="form-control"
                        required>
                </div>

                <button class="btn btn-success">
                    Import Sales
                </button>

                <a href="{{ route('vat-analyses.show', $vatAnalysis->id) }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@stop