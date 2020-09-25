@extends('layouts.app')

@section('scriptsHead')
    <link rel="stylesheet" href="{{ asset('assets/galery/css/gallery.css')}}">
    <script src="{{asset('assets/galery/js/gallery.js')}}"></script>
@endsection

@section('content')
<style>
h5 {
    font-size: 1.6em;
}
h6 {
    font-size: 1.3em;
}

img, .ns div {
    box-shadow: 2px 2px 3px 1px rgba(0, 0, 0, 0.15), 0 1px 1px 0 rgba(0, 0, 0, 0.01);
}

</style>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 d-flex m-auto">
            <div class="col-md-6 p-0">
                <img class="img-fluid mb-2" src="{{ asset('storage/'. $product->photos[0]->path) }}" alt="" style="border-radius: 5px">
                <div class="fg-gallery ns">
                    
                    @foreach($product->photos as $p)
                        <img src="{{ asset('storage/'. $p->path) }}" alt="">
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->body}}</p>
                        <hr>
                        <h6 class="card-subtitle mb-2">R$ {{ number_format($product->price, 2,',','.') }}</h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var a = new FgGallery('.ns', {
            cols: 4,
            style: {
                border: '0 solid #fff',
                height: '65px',
                borderRadius: '5px',
            }
        })
    </script>
@endsection
