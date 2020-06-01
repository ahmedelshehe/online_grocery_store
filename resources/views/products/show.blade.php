@extends('layouts.user')

@section('content')

<div class="container">
  @if(session()->has('success'))
      <div class="alert alert-success message">{{session()->get('success')}}</div>


  @endif
  <div class="row productrow">
    <div class="col-sm-4">
    <h1>{{ucfirst($product->title)}}</h1>
    <img src="{{$product->photo?$product->photo->file:'https://via.placeholder.com/300/09f/fff.png'}}" height="400" width="400" alt="">
    </div>
    <div class="col-sm-8">
    <div class="jumbotron  text-center desc row" >   
             <p>{{$product->description}}</p>
    </div>
    <div class="row">
    {!! Form::open(['action'=>['UserProductsController@addToCart',$product->id],'class'=>'order']) !!}
    <h3>Price : {{$product->price}} L.E./kilo</h3>
    <div class="form-group quantity_select">
        {{Form::label('quantity','Quantity by Kilo')}}
        <br>
        {{ Form::select('quantity', [''=>'Choose Options',1=>'1',2=>'2',3=>'3'],['class'=>'form-control'])}}
    </div>
    
    <div class="form-group cartbutton" >
        {!! Form::submit('Add to Cart', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    
    </div>
    </div>
  </div>
  <div id='line'></div>
  <div class="promises">
  <h1>Our Promises</h1>
  <ul class="list-group">
  <li class="list-group-item">Delivered on time</li>
  <li class="list-group-item">Fresh every morning from our Farms</li>
  <li class="list-group-item">Every product is examined by our experts</li>
  </ul>
  </div>

</div>

@endsection