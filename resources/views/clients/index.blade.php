@extends('adminlte::page')

@section('title', 'Client Management')

@section('plugins.Datatables', true)

@push('css')
<link rel="stylesheet"
href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">
@endpush


@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1>
            <i class="fas fa-users text-primary"></i>
            Client Management
        </h1>

        <small class="text-muted">
            Manage all registered clients for Tax Compliance & Reconciliation System
        </small>

    </div>

    <a href="{{ route('clients.create') }}" class="btn btn-primary">

        <i class="fas fa-plus-circle"></i>

        Add Client

    </a>

</div>

@stop


@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <i class="fas fa-check-circle"></i>

    {{ session('success') }}

    <button type="button" class="close" data-dismiss="alert">

        <span>&times;</span>

    </button>

</div>

@endif


<div class="row mb-3">

    <div class="col-md-4">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $clients->count() }}</h3>

                <p>Total Clients</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ \App\Models\Client::where('is_active',1)->count() }}</h3>

                <p>Active Clients</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-check"></i>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ \App\Models\Client::where('is_active',0)->count() }}</h3>

                <p>Inactive Clients</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-times"></i>

            </div>

        </div>

    </div>

</div>


<div class="card card-primary card-outline">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-table"></i>

            Registered Clients

        </h3>

    </div>


    <div class="card-body">

        <table id="clientsTable"
               class="table table-bordered table-hover table-striped">

            <thead class="bg-primary">

            <tr>

                <th>#</th>
                <th>Company</th>
                <th>PIN</th>
                <th>Contact Person</th>
                <th>Industry</th>
                <th>Status</th>
                <th width="180">Actions</th>

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

                            <span class="badge badge-success">
                                Active
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('clients.show',$client) }}"
                           class="btn btn-info btn-sm"
                           data-toggle="tooltip"
                           title="View">

                            <i class="fas fa-eye"></i>

                        </a>


                        <a href="{{ route('clients.edit',$client) }}"
                           class="btn btn-warning btn-sm"
                           data-toggle="tooltip"
                           title="Edit">

                            <i class="fas fa-edit"></i>

                        </a>


                        <form action="{{ route('clients.destroy',$client) }}"
                              method="POST"
                              class="delete-form d-inline">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    type="submit"
                                    data-toggle="tooltip"
                                    title="Delete">

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

</div>

@stop


@push('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


<script>

$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $('#clientsTable').DataTable({

        responsive: true,

        autoWidth: false,

        pageLength: 10,

        lengthMenu: [

            [10,25,50,100,-1],

            [10,25,50,100,"All"]

        ],

        order: [[1,'asc']],

        dom: 'Bfrtip',

        buttons: [

            {
                extend:'copy',
                className:'btn btn-secondary btn-sm'
            },

            {
                extend:'csv',
                className:'btn btn-success btn-sm'
            },

            {
                extend:'excel',
                className:'btn btn-success btn-sm'
            },

            {
                extend:'pdf',
                className:'btn btn-danger btn-sm'
            },

            {
                extend:'print',
                className:'btn btn-primary btn-sm'
            },

            {
                extend:'colvis',
                className:'btn btn-warning btn-sm'
            }

        ]

    });


    $('.delete-form').submit(function(e){

        e.preventDefault();

        let form = this;

        Swal.fire({

            title: 'Delete Client?',

            text: 'This action cannot be undone.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            cancelButtonColor: '#3085d6',

            confirmButtonText: 'Yes, Delete',

            cancelButtonText: 'Cancel'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>

@endpush