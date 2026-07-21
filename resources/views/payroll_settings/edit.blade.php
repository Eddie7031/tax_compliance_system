@extends('adminlte::page')

@section('title', 'Payroll Settings')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header bg-primary">

            <h3 class="card-title">
                Payroll Settings
            </h3>

        </div>

        <form method="POST"
              action="{{ route('payroll-settings.update') }}">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">
                        <label>NSSF Rate (%)</label>
                        <input type="number"
                               step="0.01"
                               name="nssf_rate"
                               value="{{ old('nssf_rate',$setting->nssf_rate) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>NSSF Ceiling</label>
                        <input type="number"
                               step="0.01"
                               name="nssf_ceiling"
                               value="{{ old('nssf_ceiling',$setting->nssf_ceiling) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>SHIF Rate (%)</label>
                        <input type="number"
                               step="0.01"
                               name="shif_rate"
                               value="{{ old('shif_rate',$setting->shif_rate) }}"
                               class="form-control">
                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-4">
                        <label>SHIF Minimum</label>
                        <input type="number"
                               step="0.01"
                               name="shif_minimum"
                               value="{{ old('shif_minimum',$setting->shif_minimum) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Housing Levy Rate (%)</label>
                        <input type="number"
                               step="0.01"
                               name="housing_levy_rate"
                               value="{{ old('housing_levy_rate',$setting->housing_levy_rate) }}"
                               class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Personal Relief</label>
                        <input type="number"
                               step="0.01"
                               name="personal_relief"
                               value="{{ old('personal_relief',$setting->personal_relief) }}"
                               class="form-control">
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Save Settings
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
