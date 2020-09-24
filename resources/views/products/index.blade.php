@extends('layouts.app')
@section('content')
<style>
    .list-group-item{
        background-color: #2b2924;
        color: bisque;
        border: 1px solid #fff2d6;
    }
</style>
<div class="container">
    @php $count = 0; @endphp
    <h2 class="mb-2 mt-4">Produtos</h2>
        <hr>
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-3 bd-sidebar p-0">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach($product_categories as $pc)
                            <li class="list-group-item">{{ $pc->name }}</li>
                        @endforeach
                    </ul>
                </div>
                    
            </div>

            <div class="col-md-9 mb-2 p-0">
                <div class="col-md-12 d-flex">
                    @foreach($products as $p)
                        @if($count % 4 === 0 && $count !== 0)
                            </div>
                            <div class="col-md-12 d-flex">
                        @endif
                        <div class="col-md-3 a-card p-1">
                            <a class="" href="{{ route('products.single', ['slug' => $p->slug]) }}">
                                <div class="card">
                                    <img class="card-img-top img-fluid" style="height:150px" 
                                    src="@if(isset($p->photos[0])){{ asset('storage/'. $p->photos[0]->path) }}
                                            @else {{ asset('assets/img/sem-imagem.png') }}@endif" 
                                    alt="{{ $p->description }}">
                                    <div class="card-body">
                                        <h6 class="card-title mb-0">{{$p->name}}</h6>
                                        <p class="card-text ">{{ $p->description }}</p>
                                        <p class="card-text">R$ {{ number_format($p->price, 2, ',', '')}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php $count++; @endphp
                    @endforeach
                </div>
            </div>
            {{$products->links()}}
        </div>
    </div>

</div>
@endsection