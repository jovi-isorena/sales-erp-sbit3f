@extends('layouts.app')

@section('content')
tickets for {{ session('CustomerID') }}
<div>
    <a href="{{ route('customerUnload') }}" class="btn btn-danger">Unload Customer</a>
    <a href="{{ route('newTicket') }}" class="btn btn-success">New Ticket</a>

</div>
<div>
    @if(count($tickets)== 0)
        No data
    @else
        @foreach ($tickets as $ticket)
            <p>{{ $ticket->Content }}</p>
        @endforeach
    @endif
</div>
{{-- @dd(session()->all()) --}}
@endsection
