@extends('adminlte::page')

@section('title', 'Client Profile')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h2 class="mb-0">
            <i class="fas fa-building text-primary"></i>
            {{ $client->company_name }}
            @if($client->is_active)
                <span class="badge badge-success ml-2">
                    Active
                </span>
            @else
                <span class="badge badge-danger ml-2">
                    Inactive
                </span>
            @endif
        </h2>
        <small class="text-muted">
            <i class="fas fa-id-card"></i>
            PIN :
            <strong>{{ $client->pin }}</strong>
        </small>
    </div>
    <div>
        <a href="{{ route('clients.edit',$client) }}"
           class="btn btn-warning">
            <i class="fas fa-edit"></i>
            Edit Client
        </a>
        <a href="{{ route('clients.index') }}"
           class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
    </div>
</div>
@stop

@section('content')

{{-- Statistics Cards --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $client->documents->count() }}</h3>
                <p>Documents</p>
            </div>
            <div class="icon">
                <i class="fas fa-folder"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>5</h3>
                <p>Tax Obligations</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $client->created_at->format('d M Y') }}</h3>
                <p>Registered</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    @if($client->is_active)
                        Active
                    @else
                        Inactive
                    @endif
                </h3>
                <p>Status</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
        </div>
    </div>
</div>

{{-- Company & Contact Information Cards --}}
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="mb-0">
                    <i class="fas fa-building"></i>
                    Company Information
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <strong>Company</strong><br>
                    {{ $client->company_name }}
                </p>
                <hr>
                <p>
                    <strong>PIN</strong><br>
                    {{ $client->pin }}
                </p>
                <hr>
                <p>
                    <strong>Industry</strong><br>
                    {{ $client->industry }}
                </p>
                <hr>
                <p>
                    <strong>Status</strong><br>
                    @if($client->is_active)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Inactive</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="mb-0">
                    <i class="fas fa-address-book"></i>
                    Contact Information
                </h5>
            </div>
            <div class="card-body">
                <p>
                    <strong>Contact Person</strong><br>
                    {{ $client->contact_person }}
                </p>
                <hr>
                <p>
                    <strong>Email</strong><br>
                    {{ $client->email }}
                </p>
                <hr>
                <p>
                    <strong>Phone</strong><br>
                    {{ $client->phone }}
                </p>
                <hr>
                <p>
                    <strong>Address</strong><br>
                    {{ $client->address ?? 'Not provided' }}
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Main Tabs --}}
<div class="card card-primary card-outline">
    <div class="card-body">
        <ul class="nav nav-tabs" id="clientTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"
                   id="general-tab"
                   data-toggle="tab"
                   href="#general">
                    <i class="fas fa-id-card"></i>
                    General Information
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="tax-tab"
                   data-toggle="tab"
                   href="#tax">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Tax Obligations
                </a>
            </li>
            <a href="{{ route('vat-analyses.create', ['client' => $client->id]) }}"
   class="btn btn-success">

    <i class="fas fa-calculator"></i>

    VAT Analysis

</a>
            
            <li class="nav-item">
                <a class="nav-link"
                   id="documents-tab"
                   data-toggle="tab"
                   href="#documents">
                    <i class="fas fa-folder-open"></i>
                    Documents
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="activity-tab"
                   data-toggle="tab"
                   href="#activity">
                    <i class="fas fa-history"></i>
                    Activity Log
                </a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            {{-- General Information --}}
            <div class="tab-pane fade show active" id="general">
                <table class="table table-bordered">
                    <tr>
                        <th width="250">Company Name</th>
                        <td>{{ $client->company_name }}</td>
                    </tr>
                    <tr>
                        <th>PIN Number</th>
                        <td>{{ $client->pin }}</td>
                    </tr>
                    <tr>
                        <th>Contact Person</th>
                        <td>{{ $client->contact_person }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $client->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $client->phone }}</td>
                    </tr>
                    <tr>
                        <th>Industry</th>
                        <td>{{ $client->industry }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $client->address }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
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
                    </tr>
                </table>
            </div>

            {{-- Tax Obligations --}}
            <div class="tab-pane fade" id="tax">
                <a href="{{ route('tax-obligations.create', $client) }}"
                   class="btn btn-success mb-3">
                    <i class="fas fa-plus-circle"></i>
                    Add Tax Obligation
                </a>
                
                <table class="table table-bordered table-hover">
                    <thead class="bg-success">
                        <tr>
                            <th>Tax Type</th>
                            <th>Frequency</th>
                            <th>Next Due Date</th>
                            <th>Status</th>
                            <th width="170">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($client->taxObligations as $tax)
                            <tr>
                                <td>{{ $tax->tax_type }}</td>
                                <td>{{ $tax->frequency }}</td>
                                <td>{{ \Carbon\Carbon::parse($tax->next_due_date)->format('d M Y') }}</td>
                                <td>
                                    @if($tax->status == 'Active')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tax-obligations.edit',$tax) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tax-obligations.destroy',$tax) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this tax obligation?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Tax Obligations Added
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Documents --}}
            <div class="tab-pane fade" id="documents">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <i class="fas fa-folder-open"></i>
                            Client Documents
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('documents.store',$client) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Document Type</label>
                                    <select name="document_type"
                                            class="form-control"
                                            required>
                                        <option value="">Select</option>
                                        <option>PIN Certificate</option>
                                        <option>Certificate of Incorporation</option>
                                        <option>CR12</option>
                                        <option>VAT Certificate</option>
                                        <option>Tax Compliance Certificate</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label>Select File</label>
                                    <input type="file"
                                           name="document"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <button class="btn btn-primary btn-block">
                                        <i class="fas fa-upload"></i>
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>Type</th>
                                    <th>Date Uploaded</th>
                                    <th width="180">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($client->documents as $document)
                                <tr>
                                    <td>{{ $document->document_name }}</td>
                                    <td>{{ $document->document_type }}</td>
                                    <td>{{ $document->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('documents.download',$document) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <form action="{{ route('documents.destroy',$document) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        No documents uploaded.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Activity Log --}}
            <div class="tab-pane fade" id="activity">
                <div class="alert alert-secondary">
                    Activity log will be displayed here.
                </div>
            </div>
        </div>
    </div>
</div>
@stop