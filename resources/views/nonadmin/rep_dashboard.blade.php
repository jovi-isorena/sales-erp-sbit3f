@extends('layouts.nonadmin')

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@endsection

@section('content')
<h1> Rep Dashboard</h1>

<div class="mb-3">
    <label for="">Month of: </label>
    <select name="month" id="month" class="">
        <option value="">December</option>
        <option value="">November</option>
        <option value="">October</option>
        <option value="">September</option>
        
    </select>
</div>

<div class="row justify-content-evenly mb-3 ">
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
<div class="row justify-content-evenly mb-3 ">
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
<div class="row justify-content-evenly mb-3">
    <div class="col-2 p-0 rounded shadow-sm text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Number of Responses</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Handled Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center">
        <div class="card">
            <div class="card-body">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer">
                <p>Escalated Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center">
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
<div>
    <div class="mb-3">
        <h3>Performance Histograms</h3>
        <div>
            <span>View By: </span>
            <select name="" id="viewHistogram" class="ml-3">
                <option value="daily">Daily</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 justify-content-evenly">
        <div class="col-md-5 border border-1 " style="width:100%;height:300px;">
            <canvas id="csat1chart"  class="" style="width:100%;height:100%;"></canvas>
        </div>
        <div class="col-md-5 border border-1 " style="width:100%;height:300px;">
            <canvas id="csat2chart"  class="" style="width:100%;height:100%;"></canvas>
        </div>
    </div>
    <div class="row mb-3 justify-content-evenly">
        <div class="col-md-5 border border-1 " style="width:100%;height:300px;">
            <canvas id="npschart"  class="" style="width:100%;height:100%;"></canvas>
        </div>
        <div class="col-md-5 border border-1 " style="width:100%;height:300px;">
            <canvas id="handledchart"  class="" style="width:100%;height:100%;"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/gauge.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script src="{{ asset('js/fillchart.js') }}"></script>
@endsection