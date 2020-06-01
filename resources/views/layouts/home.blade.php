@extends('layouts.user')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="page-header">
                  <h1>Profile</h1>      
                </div>
                <a href="{{route('orders.index')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">ViewOrders</a>
                <p>This is another text.</p>      
              </div>
        </div>
    </div>
</div>
@endsection
