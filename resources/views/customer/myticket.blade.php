{{-- @extends('layouts.app') --}}
@extends('layouts.customerui')

@section('content')
<div class="mb-3">
    {{-- <a href="{{ route('customerUnload') }}" class="btn btn-danger">Logout Customer</a> --}}
    <a href="{{ route('newTicket') }}" class="btn btn-success">New Ticket</a>

</div>
<div class="btn-group ">
    <a href="{{ route('myTicket') }}" class="btn btn-outline-primary {{ !Request::get("status") ? 'active' : '' }}">All</a>
    <a href="{{ route('myTicket') }}?status=open" class="btn btn-outline-primary {{ Request::get("status") == 'open' ? 'active' : '' }}">Open</a>
    <a href="{{ route('myTicket') }}?status=closed" class="btn btn-outline-primary {{ Request::get("status") == 'closed' ? 'active' : '' }}">Closed</a>
  </div>
<div>
    @if(count($tickets)== 0)
        <div class="justify-content-center mt-5 d-md-flex">
            <span class="lead text-center">< No Tickets ></span>
        </div>
    @else
        <table class="table text-center table-hover custom-rounded">
            <thead>
                <tr class="custom-bg-primary text-white ">
                    <th></th>
                    <th>Ticket No.</th>
                    <th>Concern</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="custom-text-primary fw-bold">
                
                @foreach ($tickets as $ticket)
                
                    <tr class="" style="height: 30px;">
                        <td> 
                            @if($ticket->Unread == 1)
                                <span class="custom-text-primary"><i class="bi bi-envelope-fill"></i></span>
                            @else
                                <span class="custom-text-secondary"><i class="bi bi-envelope-open"></i></span>
                            @endif
                        </td>
                        <td ><a href="/ticket/show/{{ $ticket->TicketNo }}" > <span class="fw-bold"> {{  $ticket->TicketNo }} </span></a></td>
                        <td> {{  $ticket->ticketcategory->Name }}</td>
                        <td class="{{ $ticket->TicketStatus == 'Closed' ? 'text-secondary' : 'text-success' }}"> {{  $ticket->TicketStatus }}</td>
                        <td> {{  Carbon\Carbon::parse($ticket->CreatedDatetime)->diffForHumans() }}</td>
                    
                        
                    </tr>
                    {{-- <div class="border border-1 rounded my-3 p-3 w-50 shadow-sm">
                        <div class="d-flex align-items-center">
                            @if($ticket->Unread == 1)
                            <div class="align-items-center">
                                <span class="text-danger"><i class="fas fa-circle"></i></span>
                            </div>
                            @endif
                            <h3 class="mr-3"><a href="/ticket/show/{{ $ticket->TicketNo }}" > Ticket# {{ $ticket->TicketNo }}</a></h3>
                            <span class="fst-italic text-muted"> {{ Carbon\Carbon::parse($ticket->CreatedDatetime)->diffForHumans() }}</span>
        
                        </div>
                        
                        <div>
                            <span class="small"> {{ $ticket->ticketcategory->Name }}</span>
        
                        </div>
                        <div>
                            <span class="small text-capitalize"> {{ $ticket->TicketStatus}}</span>
        
                        </div>
                    </div>     --}}
                @endforeach
            </tbody>
        </table>
    @endif
    
    

</div>
{{-- @dd(session()->all()) --}}
@endsection
