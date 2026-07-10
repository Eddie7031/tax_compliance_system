@extends('adminlte::page')

@section('title', 'Add Client')

@section('content_header')
<h1>Add New Client</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Please fix the following errors:</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">

        <form action="{{ route('clients.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Company Name</label>
                    <input type="text"
                           name="company_name"
                           class="form-control"
                           value="{{ old('company_name') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>KRA PIN</label>
                    <input type="text"
                           name="pin"
                           class="form-control"
                           value="{{ old('pin') }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Person</label>
                    <input type="text"
                           name="contact_person"
                           class="form-control"
                           value="{{ old('contact_person') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Industry</label>
                    <input type="text"
                           name="industry"
                           class="form-control"
                           value="{{ old('industry') }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="address"
                              class="form-control"
                              rows="3">{{ old('address') }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="is_active"
                               value="1"
                               checked>

                        <label class="form-check-label">
                            Active Client
                        </label>
                    </div>
                </div>

            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Save Client
            </button>

            <a href="{{ route('clients.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@stop