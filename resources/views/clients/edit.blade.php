@extends('adminlte::page')

@section('title', 'Edit Client')

@section('content_header')
    <h1>Edit Client</h1>
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

    <div class="card-header">
        <h3 class="card-title">Edit Client Details</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('clients.update', $client) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <!-- Company Name -->
                <div class="col-md-6 mb-3">
                    <label>Company Name <span class="text-danger">*</span></label>
                    <input type="text"
                           name="company_name"
                           class="form-control"
                           value="{{ old('company_name', $client->company_name) }}"
                           required>
                </div>

                <!-- PIN -->
                <div class="col-md-6 mb-3">
                    <label>KRA PIN <span class="text-danger">*</span></label>
                    <input type="text"
                           name="pin"
                           class="form-control"
                           value="{{ old('pin', $client->pin) }}"
                           required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $client->email) }}">
                </div>

                <!-- Phone -->
                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone', $client->phone) }}">
                </div>

                <!-- Contact Person -->
                <div class="col-md-6 mb-3">
                    <label>Contact Person</label>
                    <input type="text"
                           name="contact_person"
                           class="form-control"
                           value="{{ old('contact_person', $client->contact_person) }}">
                </div>

                <!-- Industry -->
                <div class="col-md-6 mb-3">
                    <label>Industry</label>
                    <input type="text"
                           name="industry"
                           class="form-control"
                           value="{{ old('industry', $client->industry) }}">
                </div>

                <!-- Address -->
                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="address"
                              class="form-control"
                              rows="4">{{ old('address', $client->address) }}</textarea>
                </div>

                <!-- Active -->
                <div class="col-md-12 mb-4">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               id="is_active"
                               name="is_active"
                               value="1"
                               {{ old('is_active', $client->is_active) ? 'checked' : '' }}>

                        <label class="form-check-label" for="is_active">
                            Active Client
                        </label>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update Client
            </button>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>

        </form>

    </div>

</div>

@stop