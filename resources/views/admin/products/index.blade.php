@extends('layouts.admin');

@section('content')

<table class="table table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Photo Preview</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Edit</th>
  </tr>
</thead>
<tbody>
  @if($products)

      @foreach($products as $product)
        <tr>
        <td>{{$product->id}}</td>
        <td><img src="{{$product->photo?$product->photo->file:'https://via.placeholder.com/300/09f/fff.png'}}" height="50" alt=""></td>
        <td>{{$product->price}}</td>
        <td>{{$product->stock}}</td>
        <td><a href="{{route('products.edit',$product->id)}}">edit</a></td>
        <td>
        {!! Form::open(['method'=>'DELETE','action'=>['AdminProductsController@destroy',$product->id]]) !!}
              {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        </td>
        </tr>
      @endforeach

  @endif
</tbody>
</table>



@endsection
