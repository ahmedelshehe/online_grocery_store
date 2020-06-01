@extends('layouts.user')

@section('content')
<div class="container">
<div class="row ">
    @if($cart)
        <div class="col-md-8">  
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @foreach($cart->items as $product)
               <div class="card md-2 cart-item">
                    <div class="card-body cartitem">
                        <h5 class="card-title card-t">
                            {{$product['title']}}
                        </h5>
                        <br>
                        <div class="card-text card-x">
                            <div class="form-inline">   
                                Price/Kilo : ${{$product['price']}}
                                <form action="{{ route('products.update',$product['id'])}}" method="post" class="form">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="qty" id="qty" value={{ $product['qty']}} class="form-control">
                                    <button type="submit" class="btn btn-secondary btn-sm">Change</button>
        
                                </form>
                                <br>
                                <form action="{{ route('products.destroy', $product['id'] )}}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;" class="form-control">Remove</button>   
                                </form>
                            </div>

                        </div>
                    </div>
               
               </div> 
            @endforeach
            <p><strong>Total :{{$cart->totalPrice}} L.E</strong></p>

        </div>
        <div class="col-md-4">
        <div class="card bg-primary text-white cartsum">
                <div class="card-body">
                    <h3 class="card-title">
                        Your Cart
                        <hr>
                    </h3>
                    <div class="card-text">
                        <p>
                            Total Amount is ${{$cart->totalPrice}}
                        </p>
                        <p>
                            Total Items is {{$cart->totalQty}}
                        </p>
                        <a href="{{route('cart.checkout',$cart->totalPrice)}}" class="btn btn-info">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
        
    @else
        <p>No items in the cart yet</p>
    @endif
</div>
</div>
@endsection
