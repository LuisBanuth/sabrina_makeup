@extends('admin.layouts.app')
@section('title')
    Sabrina MakeUp - Produtos
@endsection

@section('content')
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Editar Categoria
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.products.update', ['product'=>$category->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" value="{{ $category->name }}" name="name">
                    @error('name')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control @error('description')is-invalid @enderror" value="{{ $category->description }}" name="description">
                    @error('description')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>
@endsection
