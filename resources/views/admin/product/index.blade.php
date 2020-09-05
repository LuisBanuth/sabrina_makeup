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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Corpo</th>
                        <th>Preço</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $p)
                        <tr>
                            <th>{{$p->name}}</th>
                            <th>{{$p->description}}</th>
                            <th>{{$p->body}}</th>
                            <th>{{$p->price}}</th>
                            <th>
                                <div class=btn-group>
                                    <a href="{{ route('admin.products.edit', ['product'=> $p->id]) }}" class="btn btn-sm mr-2 btn-primary">Editar</a>
                                    <form action="{{ route('admin.products.destroy', ['product' => $p->id]) }}" method="post">
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
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection