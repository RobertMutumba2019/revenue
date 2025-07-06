@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Vehicle & Fuel Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf

        <h4>Fuel Settings</h4>
        <div class="form-group">
            <label>Fuel Request Validity (days)</label>
            <input type="text" name="settings_fuel_request_validity" class="form-control" value="{{ old('settings_fuel_request_validity', $settings->settings_fuel_request_validity ?? '') }}">
        </div>

        <div class="form-group">
            <label>Fuel Consumption (lts/Km)</label>
            <input type="text" name="settings_fuel_consumption" class="form-control" value="{{ old('settings_fuel_consumption', $settings->settings_fuel_consumption ?? '') }}">
        </div>

        <h4>Vehicle Settings</h4>
        <div class="form-group">
            <label>Vehicle Request Validity (days)</label>
            <input type="text" name="settings_vehicle_request_validity" class="form-control" value="{{ old('settings_vehicle_request_validity', $settings->settings_vehicle_request_validity ?? '') }}">
        </div>

        <div class="form-group">
            <label>Daily Average Distance (Km/Day)</label>
            <input type="text" name="settings_dialy_distance_territory" class="form-control" value="{{ old('settings_dialy_distance_territory', $settings->settings_dialy_distance_territory ?? '') }}">
        </div>

        <div class="form-group">
            <label>Permit/Insurance Expiry Reminder (days)</label>
            <input type="text" name="settings_expiry_reminder" class="form-control" value="{{ old('settings_expiry_reminder', $settings->settings_expiry_reminder ?? '') }}">
        </div>

        <div class="form-group">
            <label>Radius out of Kampala (Km) Requiring MD's Approval</label>
            <input type="text" name="settings_radius_out_of_kampala" class="form-control" value="{{ old('settings_radius_out_of_kampala', $settings->settings_radius_out_of_kampala ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
