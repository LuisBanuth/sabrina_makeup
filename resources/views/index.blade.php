@extends('layouts.app')
@section('content')
<style>
@media (max-width: 768px) {
    .carousel-inner .carousel-item > div {
        display: none;
    }
    .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* display 3 */
@media (min-width: 768px) {
    
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(25%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-25%);
    }
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}

.card {
    border-radius: 0;
    box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 6px 0 rgba(0, 0, 0, 0.19);
}
</style>

<div class="container my-4">
    <h2 class="font-weight-light mb-2">Destaques</h2>
    <hr>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100 mb-4" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                @php $count = 0; @endphp
                @foreach($highlights as $h)
                    <div class="carousel-item @if($count == 0) active @endif">
                        <div class="col-md-3">
                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top img-fluid" style="height:150px" src="{{ asset('storage/'. $h->photos[0]->path) }}" alt="{{ $h->description }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$h->name}}</h5>
                                    <p class="card-text">{{ $h->description }}</p>
                                    <p class="card-text">R$ {{ number_format($h->price, 2, ',', '')}}</p>
                                </div>
                            </div>
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

    @php $count = 0; @endphp
    <h2 class="font-weight-light mb-2">Produtos</h2>
    <hr>
    <div class="row">
        
        <div class="col-md-12 d-flex">
            @foreach($products as $p)
                @if($count % 4 === 0)
                    </div>
                    <div class="col-md-12 d-flex">
                @endif
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 15rem;">
                        <img class="card-img-top img-fluid" style="height:150px" src="{{ asset('storage/'. $p->photos[0]->path) }}" alt="{{ $p->description }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$p->name}}</h5>
                            <p class="card-text">{{ $p->description }}</p>
                            <p class="card-text">R$ {{ number_format($p->price, 2, ',', '')}}</p>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp
            @endforeach
        </div>
        {{$products->links()}}
    </div>






</div>





@endsection

@section('scripts')

    <script>
        $('#recipeCarousel').carousel({
            interval: 6000
        })

        $('.carousel .carousel-item').each(function(){
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