@extends('layouts.dashboard')

@section('title', 'SUNEF - Dashboard')

@section('content')
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row">
        <div class="info-box bg-light-green">
            <div class="icon"><i class="fa fa-suitcase"></i></div>
            <div class="content">
                <div class="text">EFRIS GOODS</div>
                <div class="number">0</div>
            </div>
        </div>
        <div class="info-box bg-purple">
            <div class="icon"><i class="fa fa-list"></i></div>
            <div class="content">
                <div class="text">EFRIS INVOICES</div>
                <div class="number">0</div>
            </div>
        </div>
        <div class="info-box bg-orange">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="content">
                <div class="text">REGISTERED USERS</div>
                <div class="number">0</div>
            </div>
        </div>
        <div class="info-box bg-pink">
            <div class="icon"><i class="fa fa-circle"></i></div>
            <div class="content">
                <div class="text">ONLINE USERS</div>
                <div class="number">0</div>
            </div>
        </div>
    </div>
    <div class="stat-section">
        <h3>EFRIS Uploaded Invoices</h3>
        <table border="0">
            <tr>
                <td>Today:</td>
                <td>0</td>
                <td class="divider"></td>
                <td>Yesterday:</td>
                <td>0</td>
            </tr>
            <tr>
                <td>This Week:</td>
                <td>0</td>
                <td class="divider"></td>
                <td>Last Week:</td>
                <td>0</td>
            </tr>
            <tr>
                <td>This Month:</td>
                <td>0</td>
                <td class="divider"></td>
                <td>Last Month:</td>
                <td>0</td>
            </tr>
            <tr>
                <td>This Year:</td>
                <td>0</td>
                <td class="divider"></td>
                <td>Last Year:</td>
                <td>0</td>
            </tr>
        </table>
    </div>
@endsection