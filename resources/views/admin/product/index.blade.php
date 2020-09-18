@extends('admin.layouts.app')
@section('title')
    Sabrina MakeUp - Produtos
@endsection

@section('content')
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Produtos
        </div>
        <div class="card-body">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-4">Criar produto</a>
            @if(isset($filter))
                <a href="{{ route('admin.products.index') }}" class="right btn btn-link mb-4">Remover filtro</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Destaque</th>
                            <th style="width: 120px">Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Categorias</th>
                            <th>Ordem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="frontpage" product="{{ $p->id }}" @if($p->frontpage == true) checked @endif>  
                            </td>
                            <td>
                                <img src="@if(count($p->photos) > 0) {{ asset('storage/'. $p->photos[0]->path) }}  @endif" class="img-fluid  img-thumbnail">
                            </td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->description}}</td>
                            <td>R$ {{ number_format($p->price, 2, ",", "")}}</td>
                            <td>
                                @foreach($p->categories as $c)
                                    <a href="{{ route('admin.products.filter', ['category'=> $c->id]) }}" >#{{ $c->name }} </a>
                                @endforeach
                            </td>
                            <td>{{$p->position}}</td>
                            <td>
                                <div class=btn-group>
                                    <a href="{{ route('admin.products.edit', ['product'=> $p->id]) }}" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="{{ route('admin.products.destroy', ['product' => $p->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach  
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const frontpage = document.querySelectorAll('.frontpage')

        for(f of frontpage){
            f.addEventListener('click', function(){
                let data = {
                    status: this.checked,
                    product: this.getAttribute('product'),
                    _token: '{{ csrf_token() }}'
                }
                $.ajax({
                    type: "POST",
                    url: '{{ route("admin.products.frontpage") }}',
                    data: data,
                    dataType: 'json',
                    success: function(res){

                    }
                })
            })
        }
    </script>
@endsection