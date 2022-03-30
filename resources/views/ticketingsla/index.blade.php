@extends('layouts.crmadmin')

@section('content')
    <div>
        <form action="{{ route('slaUpdate', $sla->SlaId) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                
                <div class="col-md-6">
                    <fieldset>
                        <legend>Tickets</legend>
                        <hr>
                        <div class="mb-3">
                            <label for="TicketConcurrency" class="form-label">Ticket Concurrency</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('TicketConcurrency')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="number" class="form-control" id="TicketConcurrency" name="TicketConcurrency" placeholder="Required" value="{{ old('TicketConcurrency') ?? $sla->TicketConcurrency }}">
                        </div>
                        <div class="mb-3">
                            <label for="MaxTicketIdleTime" class="form-label">Max Ticket Idle Time (in Days)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('MaxTicketIdleTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            <input type="number" class="form-control" id="MaxTicketIdleTime" name="MaxTicketIdleTime" placeholder="Required" value="{{ old('MaxTicketIdleTime') ?? $sla->MaxTicketIdleTime }}">
                        </div>
                    </fieldset>
                </div>
                
                <div class="col-md-6">
                    <fieldset>
                        <legend>Status Time</legend>
                        <hr>
                        
                        <div class="mb-3">
                            <label for="MaxRepAwayTime" class="form-label">Max Away Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('MaxRepAwayTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="MaxRepAwayTime" name="MaxRepAwayTime" placeholder="Required" value="{{ old('MaxRepAwayTime') ?? $sla->MaxRepAwayTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="MaxTotalRepAwayTime" class="form-label">Max Total Away Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('MaxTotalRepAwayTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="MaxTotalRepAwayTime" name="MaxTotalRepAwayTime" placeholder="Required" value="{{ old('MaxTotalRepAwayTime') ?? $sla->MaxTotalRepAwayTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="MaxRepBreakTime" class="form-label">Max Break Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('MaxRepBreakTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="MaxRepBreakTime" name="MaxRepBreakTime" placeholder="Required" value="{{ old('MaxRepBreakTime') ?? $sla->MaxRepBreakTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="MaxRepLunchTime" class="form-label">Max Lunch Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('MaxRepLunchTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="MaxRepLunchTime" name="MaxRepLunchTime" placeholder="Required" value="{{ old('MaxRepLunchTime') ?? $sla->MaxRepLunchTime }}">
                        </div>
                        
                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend>Waiting Time</legend>
                        <hr>
                        <div class="mb-3">
                            <label for="L1MaxWaitingTime" class="form-label">L1 Max Waiting Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L1MaxWaitingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L1MaxWaitingTime" name="L1MaxWaitingTime" placeholder="Required" value="{{ old('L1MaxWaitingTime') ?? $sla->L1MaxWaitingTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="L2MaxWaitingTime" class="form-label">L2 Max Waiting Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L2MaxWaitingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L2MaxWaitingTime" name="L2MaxWaitingTime" placeholder="Required" value="{{ old('L2MaxWaitingTime') ?? $sla->L2MaxWaitingTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="L3MaxWaitingTime" class="form-label">L3 Max Waiting Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L3MaxWaitingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L3MaxWaitingTime" name="L3MaxWaitingTime" placeholder="Required" value="{{ old('L3MaxWaitingTime') ?? $sla->L3MaxWaitingTime }}">
                        </div>
                    </fieldset>
                </div>
                
                <div class="col-md-6">
                    <fieldset>
                        <legend>Handling Time</legend>
                        <hr>
                        <div class="mb-3">
                            <label for="L1MaxHandlingTime" class="form-label">L1 Max Handling Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L1MaxHandlingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L1MaxHandlingTime" name="L1MaxHandlingTime" placeholder="Required" value="{{ old('L1MaxHandlingTime') ?? $sla->L1MaxHandlingTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="L2MaxHandlingTime" class="form-label">L2 Max Handling Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L2MaxHandlingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L2MaxHandlingTime" name="L2MaxHandlingTime" placeholder="Required" value="{{ old('L2MaxHandlingTime') ?? $sla->L2MaxHandlingTime }}">
                        </div>
                        <div class="mb-3">
                            <label for="L3MaxHandlingTime" class="form-label">L3 Max Handling Time (in Minutes)</label>
                            <span class="text-danger text-sm fst-italic"> *
                                @error('L3MaxHandlingTime')
                                    {{ $message }}
                                @enderror
                            </span>
                            
                            <input type="number" class="form-control" id="L3MaxHandlingTime" name="L3MaxHandlingTime" placeholder="Required" value="{{ old('L3MaxHandlingTime') ?? $sla->L3MaxHandlingTime }}">
                        </div>
                    </fieldset>
                </div>

                
                
            </div>
            {{--  
            'MaxRepAwayTime', 
            'MaxTotalRepAwayTime', 
            'MaxRepBreakTime', 
            'MaxRepLunchTime', 
            'MaxTicketIdleTime'] --}}
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

@endsection