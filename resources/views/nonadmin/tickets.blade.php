@extends('layouts.nonadmin')

@section('content')
<h1>test</h1>
<div class="row" style="">
    <div class="col-9">
        <h1>Tickets</h1>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        </ul>
        <div class="tab-content" id="pills-tabContent">

        </div>
    </div>
    <div class="col-3 border rounded p-0 shadow-sm">
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
   

@endsection

@section('scripts')
    {{-- timers in ticket tabs --}}
    <script src="{{ asset('js/timer.js') }}"></script>
    {{-- loads existing orders of a customer --}}
    <script src="{{ asset('js/loadorder.js') }}"></script>
    {{-- load existing tickets of a customer --}}
    <script src="{{ asset('js/loadticket.js') }}"></script>
    {{-- fetching of assigned tickets via API --}}
    <script src="{{ asset('js/loadassignedticket.js') }}"></script>
    {{-- dynamically add elements for response div --}}
    <script src="{{ asset('js/loadcomment.js') }}"></script>
    {{-- submit the response via API --}}
    <script src="{{ asset('js/submitresponse.js') }}"></script>
    {{-- manual closing of ticket --}}
    <script src="{{ asset('js/closetickettab.js') }}"></script>
    {{-- tranferring and escalating of tickets --}}
    <script src="{{ asset('js/transferticket.js') }}"></script>
    <script src="{{ asset('js/loadleader.js') }}"></script>
    


@endsection

    
    