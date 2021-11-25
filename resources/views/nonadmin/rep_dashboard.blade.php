@extends('layouts.nonadmin')

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('content')
<h1> Rep Dashboard</h1>
<div>
    Ticket Count: {{ $tickets->count() }}
</div>
<div class="mb-3">
    <label for="">Month of: </label>
    <select name="month" id="month" class="custom-select">
        <option value=""></option>
        <option value=""></option>
        <option value=""></option>
        
    </select>
</div>

<div class="row justify-content-around mb-3 ">
    <div class="col-md-5 shadow-sm p-3 rounded border">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                <i class="fas fa-info-circle text-secondary"></i>
            </div>
            <!-- blank gauge -->
            <div class="gauge-a"></div>
            <!-- semi circle to make gauge a and c look like an arc -->
            <div class="gauge-b"></div>
            <!-- moving gauge -->
            <div class="gauge-c"></div>
            <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $tickets->avg('CSAT1') }}" data-max=5.00 data-interval=0.01>0</h1><h5>CSAT 1</h5></div>
        </div> 
    </div>
    <div class="col-md-5 shadow-sm p-3 rounded border">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                <i class="fas fa-info-circle text-secondary"></i>
            </div>
            <!-- blank gauge -->
            <div class="gauge-a"></div>
            <!-- semi circle to make gauge a and c look like an arc -->
            <div class="gauge-b"></div>
            <!-- moving gauge -->
            <div class="gauge-c"></div>
            <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $tickets->avg('CSAT2') }}" data-max=5.00 data-interval=0.01>0</h1><h5>CSAT 2</h5></div>
        </div> 
    </div>
    
</div>
<div class="row justify-content-around mb-3 ">
    <div class="col-md-5 shadow-sm p-3 rounded border">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                <i class="fas fa-info-circle text-secondary"></i>
            </div>
            <!-- blank gauge -->
            <div class="gauge-a"></div>
            <!-- semi circle to make gauge a and c look like an arc -->
            <div class="gauge-b"></div>
            <!-- moving gauge -->
            <div class="gauge-c"></div>
            <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $tickets->avg('NPS') }}" data-max=5.00 data-interval=0.01>0</h1><h5>NPS</h5></div>
        </div> 
    </div>
    <div class="col-md-5 shadow-sm p-3 rounded border">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                <i class="fas fa-info-circle text-secondary"></i>
            </div>
            <!-- blank gauge -->
            <div class="gauge-a"></div>
            <!-- semi circle to make gauge a and c look like an arc -->
            <div class="gauge-b"></div>
            <!-- moving gauge -->
            <div class="gauge-c"></div>
            <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="380" data-max=600 data-interval=1>0</h1><h5>Average Handle Time <span class="fst-italic">(secs)<span></h5></div>
        </div> 
    </div>
</div>
<div class="row justify-content-around">
    <div class="col-2 p-0 rounded shadow-lg text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Number of Responses</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-lg text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Handled Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-lg text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Escalated Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-lg text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Transferred Tickets</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/gauge.js') }}"></script>
@endsection