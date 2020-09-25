@extends('layouts.app')
@section('content')
<style>
    .list-group-item{
        background-color: #2b2924;
        color: bisque;
    }
    .list-group-item:hover{
      background-color: #675d44;
    }
</style>
<div class="container">
    @php $count = 0; @endphp
    <h2 class="mb-2 mt-4">Produtos</h2>
        <hr>
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-3 bd-sidebar p-0">
                <div class="a-card card">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('products.index') }}">
                            <li class="list-group-item">
                                Todos
                            </li>
                        </a>
                        @foreach($product_categories as $pc)
                        <a href="{{ route('products.filter', ['category'=>$pc->id]) }}">
                            <li class="list-group-item">
                                {{ $pc->name }}
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                    
            </div>

            <div class="col-md-9 mb-2 p-0">
                <h4 class="ml-4">@if(isset($category)){{$category->name}}@else Todos os Produtos @endif</h4>
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
                                        <h6 class="card-title mb-1">{{$p->name}}</h6>
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