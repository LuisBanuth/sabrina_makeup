@extends('layouts.app')
@section('content')
<div class="container">
    @php $count = 0; @endphp
    <div class="col-md-12">
        <h2 class="font-weight-light mb-2">Produtos</h2>
        <hr>
        <div class="row">
            
            <div class="col-md-12 d-flex">
                @foreach($products as $p)
                    @if($count % 4 === 0)
                        </div>
                        <div class="col-md-12 d-flex">
                    @endif
                    <div class="col-md-3 mb-4 a-card">
                        <a class="" href="{{ route('products.single', ['slug' => $p->slug]) }}">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:150px" 
                                src="@if(isset($p->photos[0])){{ asset('storage/'. $p->photos[0]->path) }}
                                        @else {{ asset('assets/img/sem-imagem.png') }}@endif" 
                                alt="{{ $p->description }}">
                                <div class="card-body">
                                    <h6 class="card-title">{{$p->name}}</h6>
                                    <p class="card-text">{{ $p->description }}</p>
                                    <p class="card-text">R$ {{ number_format($p->price, 2, ',', '')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @php $count++; @endphp
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection