@extends('layouts.app')
@section('content')

    
    <div class="row mt-4">
        <div class="col-md-12 d-flex">
            <div class="col-md-5">
                Fotos
            </div>
            <div class="col-md-7">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <p>{{ number_format($product->price, 2,',','.') }}</p>
            </div>
        </div>
    </div>

@endsection