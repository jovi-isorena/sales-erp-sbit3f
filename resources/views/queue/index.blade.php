@extends('layouts.app')

@section('content')
    <form action="{{ route('resetQueue') }}" method="get">
        @csrf
        <input type="submit" value="RESET QUEUE" class="btn btn-secondary">
    </form>
    <div class="row align-items-center my-2">
        @foreach ($teams as $team)
            <div class="col border rounded shadow-sm m-2 p-2 teamQueue" id={{ $team->TeamID }}>
                <h3 class="mr-3">{{ $team->TeamName }} Queue</h3>
                <h5>Tickets on Queue: <span class="ticketOnQueue">{{ $tickets->where('AssignedTeam', $team->TeamID)->count() }}<span></h5>
                <div class="form-check form-switch pl-5">
                    <input class="form-check-input switch" type="checkbox" role="switch" id="switch-{{ $team->TeamID }}" name="switch-{{ $team->TeamID }}" value="{{ $team->TeamID }}" data-bs-toggle="#btn-{{ $team->TeamID }}" onchange="checkQueue()">
                    <label class="form-check-label" for="switch-{{ $team->TeamID }}">Automate</label>
                </div>
                <form action="{{ route('assign') }}" method="post">
                    @csrf
                    <input type="hidden" name="team" value="{{ $team->TeamID }}">
                    <input type="submit" value="ASSIGN TICKET" class="btn btn-info" id="btn-{{ $team->TeamID }}">
                </form>
            </div>
            
        @endforeach
    </div>
    <div id="repDiv">
        @foreach ($reps as $rep)
            <div class=" border rounded p-2 mb-2 {{ $rep->queue != null ? $rep->queue->OnlineStatus == 'active' ? 'bg-success' : 'bg-danger' : 'bg-secondary'}} bg-gradient text-white" id={{ $rep->EmployeeID }}>
                <form action="{{ route('enqueue') }}" method="POST" class="">
                    @csrf
                    <div class="row align-items-center">
                        <input type="hidden" name="EmployeeID" id="EmployeeID" value={{ $rep->EmployeeID }}>
                        <div class="col">
                            Name: <br>{{ $rep->FirstName . ' ' . $rep->LastName }}
                        </div>
                        <div class="col">
                            Team: <br>{{ $rep->team->TeamName }}
                        </div>
                        <div class="col">
                            Active Tickets: <br><span class="ticketCount">{{ $rep->tickets->where('EnqueuedDatetime', '<>', null)->count() }}</span>
                        </div>
                        <div class="col">
                            <select name="status" id="status" class="form-select custom-select ">
                                <option hidden>Offline</option>  
                                
                                <option value="hold" {{ $rep->queue['OnlineStatus'] == 'hold' ? 'selected' : '';}}>Hold</option>
                                <option value="active" {{ $rep->queue['OnlineStatus'] == 'active' ? 'selected' : '';}}>Active</option>
                                <option value="away" {{ $rep->queue['OnlineStatus'] == 'away' ? 'selected' : '';}}>Away</option>
                                <option value="break" {{ $rep->queue['OnlineStatus'] == 'break' ? 'selected' : '';}}>Break</option>
                                <option value="lunch" {{ $rep->queue['OnlineStatus'] == 'lunch' ? 'selected' : '';}}>Lunch</option>
                            </select>
                            <div>
                                Status: <span class="onlineStatus text-capitalize">{{ $rep->queue['OnlineStatus'] }}</span>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" value="Update Status" class="btn btn-warning">
                        </div>
                        
                    </div>
                    
                </form>
                <div class="col">
                    <form action="{{ route('dequeue') }}" method="get">
                        @csrf
                        <input type="hidden" name="EmployeeID" value={{ $rep->EmployeeID }}>
                        <input type="submit" value="Logout" class="btn btn-secondary {{ $rep->queue == null ? 'pe-none' : '' }}">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/automatequeue.js') }}"></script>
@endsection