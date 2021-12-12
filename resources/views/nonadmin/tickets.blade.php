@extends('layouts.nonadmin')

@section('content')
{{-- style="overflow-x: hidden" --}}
<div class="row p-0 justify-content-evenly pb-3" >
    <div class="col-8">
        {{-- <h1>Tickets</h1> --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        </ul>
        <br>
        <div class="tab-content mt-3" id="pills-tabContent">

        </div>
    </div>
    <div class="col-3 custom-rounded p-0 custom-shadow overflow-hidden">
        <div class=" h-100">
            <div>
                <div class="custom-bg-secondary text-white pt-3 pb-1 ">
                    <h3 class="text-center"><i class="fas fa-book mr-3"></i>NullEdge Search</h3>
                </div>
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
                <div class="pl-2">
                    <div class="form-check form-check-inline ">
                        <input class="form-check-input" type="checkbox" id="productSearch" value="productSearch">
                        <label class="form-check-label " for="productSearch" style="font-size: .7rem;">Product</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="troubleshootingSearch" value="troubleshootingSearch">
                        <label class="form-check-label" for="troubleshootingSearch"  style="font-size: .7rem;">Troubleshooting</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="promoSearch" value="promoSearch" >
                        <label class="form-check-label" for="promoSearch"  style="font-size: .7rem;">Promo</label>
                      </div>
                </div> 
            </div>
            <div id="searchResult">
                <div class="searchResult">
                    <div class="searchResultHeader"></div>
                    <div class="searchResultBody"></div>
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

    
    