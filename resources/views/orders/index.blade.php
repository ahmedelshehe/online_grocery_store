@extends('layouts.user')
@section('style')
<link href="{{asset('css/order.css')}}" rel="stylesheet">
@endsection
@section('content')
    
        
    <div class="container-o">
        
        @foreach ($carts as $cart)
        <div class="row">
            <div class="col-md-8">
                <div class="card-o">
                    <h5 class="text-center"><i>Order #{{$count}}</i></h5>
                    @foreach ($cart->items as $item)
                    <div class="container-o">                          
                    <h4>{{$item['qty']}} Kilos of <b>{{$item['title']}}</b></h4>
                    <p class="text-right">{{$item['price']}} L.E/kilo</strong></p>
                    <p class="text-right">Total :{{$item['price']*$item['qty']}}</strong></p>
                    </div>
                    <hr>
                    
                    @endforeach
                    <div class="card-text">
                        <p class="text-right">Total Price : <strong>{{$cart->totalPrice}}</strong></p>
                    </div>
                    
                  </div>
                  <br><br>
                                        
              @php
                  $count +=1;
              @endphp          
                    
            </div>
        </div>
        @endforeach
    </div>

    

@endsection