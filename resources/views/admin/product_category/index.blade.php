@extends('admin.layouts.app')
@section('title')
    Sabrina MakeUp - Categorias de Produtos
@endsection

@section('content')
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Categorias de Produtos
        </div>
        <div class="card-body">
            <a href="{{ route('admin.categories.products.create') }}" class="btn btn-primary mb-4">Criar Categoria</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $c)
                        <tr>
                            <th>{{$c->name}}</th>
                            <th>{{$c->description}}</th>
                            <th>
                                <div class=btn-group>
                                    <a href="{{ route('admin.categories.products.edit', ['product'=> $c->id]) }}" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="{{ route('admin.categories.products.destroy', ['product' => $c->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach  
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>

@endsection