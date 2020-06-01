@extends('layouts.user')

@section('content')
<div class="jumbotron">
    
    <h1>Products</h3>
</div>
<div class="container">
<div class="row">
    @if($products)
    @foreach($products as $product)
    <div class="col-lg-3 product_col" >
    <div class="card productcard" >
        <img class="card-img-top" src="{{$product->photo?$product->photo->file:'https://via.placeholder.com/300/09f/fff.png'}}" width="320px" alt="Card image">
    <div class="card-body text-center">
        <h4 class="card-title">{{ucfirst($product->title)}}</h4>
        <h5 class="card-title" style="color:blue">{{$product->price}} $</h5>       
        <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">view product</a>
    </div>
    </div>
    </div>
    @endforeach
    @else
    <h1>No products at the moment</h1>
    @endif
    
    
  </div>
</div>



        @endsection