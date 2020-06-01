@extends('layouts.admin')


@section('content')

    <h1>Create Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'AdminProductsController@store','files'=>true]) !!}
    <div class="form-group">
        {{Form::label('title', 'Product Title')}}
        <br>
        {{Form::text('title',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        <br>
        {{Form::textarea('description',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('photo_id', 'Photo')}}
        <br>
        {{Form::file('photo_id',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('price', 'Product Price')}}
        <br>
        {{Form::number('price',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('stock', 'Product Price')}}
        <br>
        {{Form::number('stock',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group ">
        {!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
    </div>




    {!! Form::close() !!}


@endsection
