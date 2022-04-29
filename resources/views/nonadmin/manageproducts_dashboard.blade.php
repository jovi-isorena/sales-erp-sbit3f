@extends('layouts.ordermanager')

@section('content')


<div style="height: 100vh; width: 100%;">

    <div class="row">
        <div class="col-sm-5 col-md-2">
            
            <div class="side">

                <label for=""> <a href="{{ route('toPayPage') }}"> Manage Products </a></label>
                <br>
                <label for=""> <a href="{{ route('toShipPage') }}"> Transactions </a></label>
                <br>
                <label for=""> <a href="{{ route('toShipPage') }}"> Request Products </a></label>
                <br>
                <label for=""> <a href="{{ route('toShipPage') }}"> Requested Products </a></label>
                <br>
                <label for=""> <a href="{{ route('toDeliverPage') }}"> New Products </a></label>
  
            
            </div>
        
        </div>

        <div  class="col-sm-5 offset-sm-2 col-md-10 offset-md-0">
            
            <div class="row">
                <div style="width: 100%; height: 50px; border: 1px solid;">
                    <h4>
                        Manage Products
                    </h4>
                </div>
            </div>

            

<div class="row " style="margin-top: 30px;">
   
    <div class="card bg-primary" style="width: 100px; height: 100px; margin-right: 40px;"> 
        <p>Total products</p>
        
        <h3>50</h3>
    </div> 
    <div class="card bg-primary" style="width: 100px; height: 100px; margin-right: 40px;"> 
        <p>Total Profits</p>
        <h3>$100</h3>
    </div>
    <div class="card bg-primary" style="width: 100px; height: 100px; margin-right: 40px;"> 
        <p>Low stocks</p>
        <h3>5</h3>
    </div>
    <div class="card bg-primary" style="width: 100px; height: 100px; margin-right: 40px;"> 
        <p>Unavailable Products</p>
        <h3>10</h3>
    </div>
    <div class="card bg-primary" style="width: 100px; height: 100px; margin-right: 40px;"> 
        <p>New Add Products</p>
        <h3>10</h3>
    </div>
    
</div>

            <div class="row">
                <div style="width: 100%; margin-top: 50px;">
                 
                    

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Product Category</th>
                                <th>Product Total number</th>
                                <th>Product Stock Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            
     

        </div>
    </div>

</div>




















@endsection
