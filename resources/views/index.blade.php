@extends('layouts.app')
@section('content')
<style>
@media (max-width: 768px) {
    #recipeCarousel .carousel-inner .carousel-item > div {
        display: none;
    }
    #recipeCarousel .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
}

#recipeCarousel .carousel-inner .carousel-item.active,
#recipeCarousel .carousel-inner .carousel-item-next,
#recipeCarousel .carousel-inner .carousel-item-prev {
    display: flex;
}

/* display 3 */
@media (min-width: 768px) {
    
    #recipeCarousel .carousel-inner .carousel-item-right.active,
    #recipeCarousel .carousel-inner .carousel-item-next {
      transform: translateX(25%);
    }
    
    #recipeCarousel .carousel-inner .carousel-item-left.active, 
    #recipeCarousel .carousel-inner .carousel-item-prev {
      transform: translateX(-25%);
    }
}

#recipeCarousel .carousel-inner .carousel-item-right,
#recipeCarousel .carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}



</style>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src=" {{ asset('assets/img/banner1.jpg') }}" alt="First slide" style="width:100%">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src=" {{ asset('storage/categoryphotos/6ja8vByhaYOiDGAGRKfysISiwVcReifrwCK7STWq.jpeg') }}" alt="Second slide" style="width:100%">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        
        <div class="col-md-12 mt-4">
            <h2 class="mb-2">DESTAQUES</h2>
            <hr>
            <div class="row mx-auto my-auto">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        @php $count = 0; @endphp
                        @foreach($highlights as $h)
                            <div class="carousel-item @if($count == 0) active @endif">
                                <div class="col-md-3 mb-4 a-card">
                                    <a class="" href="{{ route('products.single', ['slug' => $h->slug]) }}">
                                        <div class="card" >
                                        <img class="card-img-top img-fluid" style="height:150px" 
                                    src="@if(isset($h->photos[0])){{ asset('storage/'. $h->photos[0]->path) }}
                                            @else {{ asset('assets/img/sem-imagem.png') }}@endif" 
                                    alt="{{ $h->description }}">
                                            <div class="card-body">
                                                <h6 class="card-title mb-1">{{$h->name}}</h6>
                                                <p class="card-text mb-0">R$ {{ number_format($h->price, 2, ',', '')}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endforeach
                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        @php $count = 0; @endphp
        <div class="col-md-12 mt-4">
            <h2 class="mb-2">Produtos</h2>
            <hr>
            <div class="row">
                
                <div class="col-md-12 d-flex">
                    @foreach($products as $p)
                        @if($count % 6 === 0)
                            </div>
                            <div class="col-md-12 d-flex">
                        @endif
                        <div class="col-md-2 a-card p-2">
                            <a class="" href="{{ route('products.single', ['slug' => $p->slug]) }}">
                                <div class="card">
                                    <img class="card-img-top img-fluid" style="height:150px" 
                                    src="@if(isset($p->photos[0])){{ asset('storage/'. $p->photos[0]->path) }}
                                            @else {{ asset('assets/img/sem-imagem.png') }}@endif" 
                                    alt="{{ $p->description }}">
                                    <div class="card-body">
                                        <h6 class="card-title mb-1">{{$p->name}}</h6>
                                        <p class="card-text mb-0">R$ {{ number_format($p->price, 2, ',', '')}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php $count++; @endphp
                    @endforeach
                </div>
                <div class="col-md-12">
                    <a href="{{ route('products.index') }}" class="float-right">Ver todos</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scriptsFoot')

    <script>
        if($('#recipeCarousel .carousel-item').length >= 4){
            $('#recipeCarousel').carousel({
                interval: 6000
            })
        } else {
            $('#recipeCarousel').carousel({
                interval: 0
            })
            $('#recipeCarousel .carousel-control-prev').remove()
            $('#recipeCarousel .carousel-control-next').remove()
        }

        
        $('#recipeCarousel .carousel-item').each(function(){
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>

@endsection