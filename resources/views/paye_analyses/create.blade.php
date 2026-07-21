@extends('adminlte::page')

@section('title','New PAYE Analysis')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Create PAYE Analysis</h4>

    </div>

    <form method="POST"
          action="{{ route('paye-analyses.store') }}">

        @csrf

        <div class="card-body">

            <div class="form-group">

                <label>Client</label>

                <select
                    name="client_id"
                    class="form-control"
                    required>

                    <option value="">
                        Select Client
                    </option>

                    @foreach($clients as $client)

                        <option value="{{ $client->id }}">

                            {{ $client->company_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>PAYE Period</label>

                <input
                    type="month"
                    name="period"
                    class="form-control"
                    required>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                Create PAYE Working Paper

            </button>

        </div>

    </form>

</div>

@endsection
