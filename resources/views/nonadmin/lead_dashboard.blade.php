@extends('layouts.nonadmin')

@section('content')
    <h1>Leader Dashboard</h1>
    <h2 class="lead">{{ auth()->user()->employee->team->TeamName }} Team</h2>
{{-- - # of representatives on queue
        - breakdown of status
    - # of tickets on queue
        - priority level
    - histograms
        - csat 1
        - csat 2
        - nps
        - aht
        - total handled tickets --}}
    <div class="d-flex justify-content-evenly text-center mb-3">
        <div class="col-md-3 custom-shadow custom-rounded p-0 overflow-hidden custom-border-primary ">
            <div class="card border-0">
                <div class="card-header custom-bg-primary text-white">
                    <h4 class="card-title p-0">
                        Tickets<br>On Queue
                    </h4>
                </div>
                <div class="card-body">
                    <h2 class="custom-text-primary">
                        {{ $tickets->count() }}
                    </h2>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-right">Priority Level</div>
                        <div class="col text-left">Count</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">L1</div>
                        <div class="col text-left">{{ $tickets->where('PriorityLevel', 1)->count() }}</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">L2</div>
                        <div class="col text-left">{{ $tickets->where('PriorityLevel', 2)->count() }}</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">L3</div>
                        <div class="col text-left">{{ $tickets->where('PriorityLevel', 3)->count() }}</div>
                    </div>
                    
                
                </div>
            </div>
        </div>
        <div class="col-md-3 custom-shadow custom-rounded p-0 overflow-hidden custom-border-primary ">
            <div class="card border-0">
                <div class="card-header custom-bg-primary text-white">
                    <h4 class="card-title p-0">
                        Active Representatives
                    </h4>
                </div>
                <div class="card-body">
                    <h2 class="custom-text-primary">
                        {{ $reps->where('OnlineStatus', 'Active')->count() }}
                    </h2>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-right">Total Online</div>
                        <div class="col text-left">{{ $reps->count() }}</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">Hold</div>
                        <div class="col text-left">{{ $reps->where('OnlineStatus', 'Hold')->count() }}</div>
                    </div>
                   <div class="row">
                        <div class="col text-right">Break</div>
                        <div class="col text-left">{{ $tickets->where('OnlineStatus', 'Break')->count() }}</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">Lunch</div>
                        <div class="col text-left">{{ $tickets->where('OnlineStatus', 'Lunch')->count() }}</div>
                    </div>
                    <div class="row">
                        <div class="col text-right">Away</div>
                        <div class="col text-left">{{ $tickets->where('OnlineStatus', 'Away')->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="">Month of: </label>
        <select name="month" id="month" class="">
            <option value="">December</option>
            <option value="">November</option>
            <option value="">October</option>
            <option value="">September</option>
            
        </select>
    </div>
    
    <div class="d-flex justify-content-evenly mb-3 ">
        <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary">
            <div class="gauge-container">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                    <i class="fas fa-info-circle custom-text-secondary"></i>
                </div>
                <!-- blank gauge -->
                <div class="gauge-a"></div>
                <!-- semi circle to make gauge a and c look like an arc -->
                <div class="gauge-b"></div>
                <!-- moving gauge -->
                <div class="gauge-c"></div>
                <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $feedbacks->avg('CSAT1') }}" data-max=5.00 data-interval=0.01>0</h1><h5>CSAT 1</h5></div>
            </div> 
        </div>
        <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary">
            <div class="gauge-container">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                    <i class="fas fa-info-circle custom-text-secondary"></i>
                </div>
                <!-- blank gauge -->
                <div class="gauge-a"></div>
                <!-- semi circle to make gauge a and c look like an arc -->
                <div class="gauge-b"></div>
                <!-- moving gauge -->
                <div class="gauge-c"></div>
                <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $feedbacks->avg('CSAT2') }}" data-max=5.00 data-interval=0.01>0</h1><h5>CSAT 2</h5></div>
            </div> 
        </div>
        
    </div>
    <div class="d-flex justify-content-evenly mb-3 ">
        <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary">
            <div class="gauge-container">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                    <i class="fas fa-info-circle custom-text-secondary"></i>
                </div>
                <!-- blank gauge -->
                <div class="gauge-a"></div>
                <!-- semi circle to make gauge a and c look like an arc -->
                <div class="gauge-b"></div>
                <!-- moving gauge -->
                <div class="gauge-c"></div>
                <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $feedbacks->avg('NPS') }}" data-max=5.00 data-interval=0.01>0</h1><h5>NPS</h5></div>
            </div> 
        </div>
        <div class="col-md-5 shadow-sm p-3 rounded custom-border-primary">
            <div class="gauge-container">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" class="dashboard-tooltip">
                    <i class="fas fa-info-circle custom-text-secondary"></i>
                </div>
                <!-- blank gauge -->
                <div class="gauge-a"></div>
                <!-- semi circle to make gauge a and c look like an arc -->
                <div class="gauge-b"></div>
                <!-- moving gauge -->
                <div class="gauge-c"></div>
                <div class="gauge-data p-4"><h1 class="score" data-current=0 data-value="{{ $handled->avg('HandlingTime') }}" data-max=500 data-interval=1>0</h1><h5>Average Handling Time (in secs)</h5></div>
            </div> 
            
        </div>
        
    </div>
    <div>
        <div class="mb-3">
            <h3>Performance Histograms</h3>
            <div>
                <span>View By: </span>
                <select name="" id="viewHistogram" class="ml-3" id="viewby">
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