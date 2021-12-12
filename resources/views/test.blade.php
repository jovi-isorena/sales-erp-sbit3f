@extends('layouts.app')

@section('content')
    {{-- {{ dd($tickets) }} --}}
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>CSAT1</th>
                <th>CSAT2</th>
                <th>NPS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->first()->RatingDatetime }}</td>
                    <td>{{  $ticket->avg('CSAT1') }}</td>
                    <td>{{  $ticket->avg('CSAT2') }}</td>
                    <td>{{  $ticket->avg('NPS') }}</td>
                </tr>
            @endforeach
                
        </tbody>
    </table>
@endsection

@section('scripts')
    
@endsection