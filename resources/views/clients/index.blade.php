@extends('adminlte::page')

@section('title', 'Clients')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Client Management</h1>

    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Client
    </a>
</div>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Registered Clients</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

            <tr>
                <th>#</th>
                <th>Company</th>
                <th>PIN</th>
                <th>Contact Person</th>
                <th>Industry</th>
                <th>Status</th>
                <th width="180">Action</th>
            </tr>

            </thead>

            <tbody>

            @forelse($clients as $client)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $client->company_name }}</td>

                <td>{{ $client->pin }}</td>

                <td>{{ $client->contact_person }}</td>

                <td>{{ $client->industry }}</td>

                <td>

                    @if($client->is_active)

                        <span class="badge badge-success">Active</span>

                    @else

                        <span class="badge badge-danger">Inactive</span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('clients.show',$client) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('clients.edit',$client) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form
                        action="{{ route('clients.destroy',$client) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this client?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center">

                    No clients found.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $clients->links() }}

    </div>

</div>

@stop