@extends('layouts.nonadmin')

@section('content')
<h1>Tickets</h1>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            
        {{-- @foreach ($tickets as $ticket)
            <li class="nav-item mr-3" role="presentation">
                <button class="nav-link btn border {{ $loop->index == 0 ? 'active' : '' }}" 
                    id="{{ $ticket->TicketNo }}-tab" data-bs-toggle="tab" 
                    data-bs-toggle="pill"
                    data-bs-target="#content{{ $ticket->TicketNo }}" 
                    type="button" role="tab" 
                    aria-controls="pills-{{ $ticket->TicketNo }}" 
                    aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}">
                        <strong>{{ $ticket->customer->FirstName }}</strong>
                        (<small data-time-source="{{ $ticket->TicketNo }}-time" class="timer fst-italic">00:00:00</small>)
                        <input type="hidden" id="{{ $ticket->TicketNo }}-time" value="{{ $ticket->AssignedDatetime }}">
                </button>
                

            </li>
            
        @endforeach --}}
        {{-- <li>    </li> --}}
    </ul>
    <div class="tab-content" id="pills-tabContent">

        {{-- @foreach ($tickets as $ticket)
            <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="content{{ $ticket->TicketNo }}" role="tabpanel" aria-labelledby="{{ $ticket->TicketNo }}-tab">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">
                            <strong>Ticket# {{ $ticket->TicketNo }}</strong>
                        </span>
                    </div>
                    <div class="card-body">
                        <p>Customer Name: {{ $ticket->customer->FirstName . ' ' . $ticket->customer ->LastName }}</p>
                        <p>Created On: {{ $ticket->CreatedDatetime }}</p>
                        <p>Concern:</p>
                        <p>{{ $ticket->Content }}</p>

                        

                    </div>
                    <div class="card-footer">
                        <div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist2">
                                    <button class="nav-link active" id="nav-custprofile-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" data-bs-toggle="tab" data-bs-target="#nav-custprofile-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" type="button" role="tab" aria-controls="nav-custprofile-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" aria-selected="true">Customer Profile</button>
                                    <button class="nav-link" id="nav-custticket-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" data-bs-toggle="tab" data-bs-target="#nav-custticket-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" type="button" role="tab" aria-controls="nav-custticket-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" aria-selected="false" onclick="loadtickets(this,'{{ $ticket->CreatedBy }}')" data-value="{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">Tickets</button>
                                    <button class="nav-link" id="nav-custorder-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" data-bs-toggle="tab" data-bs-target="#nav-custorder-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" type="button" role="tab" aria-controls="nav-custorder-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" aria-selected="false" onclick="loadorders(this,'{{ $ticket->CreatedBy }}')" data-value="{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">Orders</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-custprofile-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" role="tabpanel" aria-labelledby="nav-custprofile-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">
                                    <div>First Name: {{ $ticket->customer->FirstName }}</div>
                                    <div>Middle Name: {{ $ticket->customer->MiddleName ?? '<null>' }}</div>
                                    <div>Last Name: {{ $ticket->customer->LastName }}</div>
                                    <div>Suffix: {{ $ticket->customer->Suffix ?? '<null>' }}</div>
                                    <div>Birthdate: {{ $ticket->customer->Birthdate }}</div>
                                    <div>Street Address: {{ $ticket->customer->Address }}</div>
                                    <div>Barangay: {{ $ticket->customer->Barangay }}</div>
                                    <div>City: {{ $ticket->customer->City }}</div>
                                    <div>Zip: {{ $ticket->customer->Zip }}</div>
                                    <div>Mobile: {{ $ticket->customer->Mobile }}</div>
                                    
                                </div>
                                <div class="tab-pane fade" id="nav-custticket-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" role="tabpanel" aria-labelledby="nav-custticket-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">
                                    <h3>Customer's Tickets</h3>
                                    <div class="accordion" id="accordionPanelsTickets-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-custorder-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}" role="tabpanel" aria-labelledby="nav-custorder-tab-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">
                                    <h3>Orders</h3>
                                    <div class="accordion" id="accordionPanelOrders-{{ $ticket->CreatedBy }}-{{ $ticket->TicketNo }}">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                    
            </div>
            
        @endforeach --}}
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/timer.js') }}"></script>
    <script src="{{ asset('js/loadorder.js') }}"></script>
    <script src="{{ asset('js/loadticket.js') }}"></script>
    <script src="{{ asset('js/loadassignedticket.js') }}"></script>
    <script src="{{ asset('js/loadcomment.js') }}"></script>
    <script src="{{ asset('js/submitresponse.js') }}"></script>
    <script src="{{ asset('js/closetickettab.js') }}"></script>
    


@endsection

    
    