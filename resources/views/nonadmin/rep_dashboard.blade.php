@extends('layouts.nonadmin')

@section('css')
    

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
        <option value="">August</option>
        
    </select>
</div>

<div class="d-flex justify-content-evenly mb-3 ">
    <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary bg-white">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Overall satisfaction for the company" class="dashboard-tooltip">
                <i class="fas fa-info-circle custom-text-secondary"></i>
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
    <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary bg-white">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Satisfaction for the employee" class="dashboard-tooltip">
                <i class="fas fa-info-circle custom-text-secondary"></i>
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
<div class="d-flex justify-content-evenly mb-3 ">
    <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary bg-white">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="How likely the customers will recommend the company" class="dashboard-tooltip">
                <i class="fas fa-info-circle custom-text-secondary"></i>
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
    <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary bg-white">
        <div class="gauge-container">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Average handling time of tickets" class="dashboard-tooltip">
                <i class="fas fa-info-circle custom-text-secondary"></i>
            </div>
            <!-- blank gauge -->
            <div class="gauge-a"></div>
            <!-- semi circle to make gauge a and c look like an arc -->
            <div class="gauge-b"></div>
            <!-- moving gauge -->
            <div class="gauge-c"></div>
            <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{$handled->avg('HandlingTime')}}" data-max=7500 data-interval=1>0</h1><h6>Average Handle Time <span class="fst-italic">(secs)<span></h6></div>
        </div> 
    </div>
</div>
<div class="row justify-content-evenly mb-3">
    <div class="col-2 p-0 shadow-sm text-center custom-rounded">
        <div class="card custom-rounded">
            <div class="card-body custom-text-primary">
                <h1>{{ $tickets->count() }}</h1>
            </div>
            <div class="card-footer custom-bg-primary text-white text-nowrap px-0 ">
                <p>Number of Responses</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center custom-rounded">
        <div class="card">
            <div class="card-body custom-text-primary">
                <h1>{{ $handled->where('ActionTaken', 'Responded')->count() }}</h1>
            </div>
            <div class="card-footer custom-bg-primary text-white text-nowrap px-0">
                <p>Responded Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center custom-rounded">
        <div class="card">
            <div class="card-body custom-text-primary">
                <h1>{{ $handled->where('ActionTaken', 'Escalated')->count() }}</h1>
            </div>
            <div class="card-footer custom-bg-primary text-white text-nowrap px-0">
                <p>Escalated Tickets</p>
            </div>
        </div>
    </div>
    <div class="col-2 p-0 rounded shadow-sm text-center custom-rounded">
        <div class="card">
            <div class="card-body custom-text-primary">
                <h1>{{ $handled->where('ActionTaken', 'Transferred')->count() }}</h1>
            </div>
            <div class="card-footer custom-bg-primary text-white text-nowrap px-0">
                <p>Transferred Tickets</p>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="mb-3">
        <h3>Performance Histograms</h3>
        <div>
            <span>Daily Performance</span>
            {{-- <span>View By: </span>
            <select name="" id="viewHistogram" class="ml-3" id="viewby">
                <option value="daily">Daily</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select> --}}
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