@extends('adminlte::page')

@section('title','PAYE Analyses')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>
        <i class="fas fa-users"></i>
        PAYE Analyses
    </h2>

    <a href="{{ route('paye-analyses.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>

        New PAYE Analysis

    </a>

</div>

<div class="card shadow">

    <div class="card-header">

        <h5 class="mb-0">
            PAYE Working Papers
        </h5>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">

            <tr>

                <th>#</th>
                <th>Company</th>
                <th>PAYE Period</th>
                <th>Status</th>
                <th width="180">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($analyses as $analysis)

                <tr>

                    <td>{{ $analysis->id }}</td>

                    <td>
                        {{ $analysis->client->company_name }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($analysis->period.'-01')->format('F Y') }}
                    </td>

                    <td>

                        @if($analysis->status=='Filed')

                            <span class="badge badge-success">
                                Filed
                            </span>

                        @elseif($analysis->status=='Approved')

                            <span class="badge badge-primary">
                                Approved
                            </span>

                        @elseif($analysis->status=='Reviewed')

                            <span class="badge badge-info">
                                Reviewed
                            </span>

                        @else

                            <span class="badge badge-warning">
                                Draft
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('paye-analyses.show',$analysis) }}"
                           class="btn btn-sm btn-primary">

                            Open

                        </a>

                        <a href="{{ route('paye-analyses.edit',$analysis) }}"
                           class="btn btn-sm btn-warning">

                            Edit

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        No PAYE analyses found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
