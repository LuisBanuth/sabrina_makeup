@extends('admin.layouts.app')
@section('title')
    Sabrina MakeUp - Produtos
@endsection

@section('content')
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Editar Produto
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', ['product' => $product->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" value="{{$product->name}}" name="name">
                    @error('name')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control @error('description')is-invalid @enderror" value="{{$product->description}}" name="description">
                    @error('description')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Corpo</label>
                    <textarea cols="30" rows="10" type="text" class="form-control @error('body')is-invalid @enderror" name="body">{{ $product->body }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control @error('price')is-invalid @enderror" value="{{ $product->price }}" name="price">
                    @error('price')
                        <div class="invalid-feedback">  
                            {{$message}}
                        </div>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="categories">Categorias</label>
                    <select name="categories[]" class="form-control" multiple>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" @if($product->categories->contains($c)) selected @endif>{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="filepond">Fotos</label>
                    <div class="row mb-4">
                        
                    @foreach($product->photos as $photo)
                        <div class="col-md-2 text-center">
                            <img src="{{ asset('storage/'. $photo->path) }}" class="img-fluid img-thumbnail mb-2 photo" photo="{{$photo->id}}">
                            <button class="btn btn-sm btn-danger deletePhoto" href="#">Excluir</button>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="form-group">
                <label for="filepond">Inserir novas fotos</label>
                    <input type="file" class="my-pond" name="filepond[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <!-- add to document <head> -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    <!-- add before </body> -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement, {maxFiles: 10,} );
        const urlFilePond = '/sabrina_makeup/public/filepond/'; //alterar na versão final

        FilePond.setOptions({
            server: {
                process: {
                    url: urlFilePond + 'process',
                    method: 'POST',
                    withCredentials: false,
                    headers: {},
                    timeout: 7000,
                    onload: null,
                    onerror: null,
                    ondata: null
                },
                revert: (uniqueFileId, load, error) => {
                    let data = {
                        photo: uniqueFileId,
                    }
                    $.ajax({
                        type: 'DELETE',
                        url: urlFilePond + 'revert',
                        data: data,
                        dataType: 'json'
                    });

                    error('Erro');

                    load();
                },
                load: './load/',
            }
        });

        if(document.querySelector('.deletePhoto')){
            let photos = document.querySelectorAll('.deletePhoto')

            for(p of photos){
                p.addEventListener('click', function(event){
                    event.preventDefault()
                    let photo = this.previousElementSibling
                    let data = {
                        photo: photo.getAttribute('photo'),
                        _token: '{{ csrf_token() }}'
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("admin.products.deletephoto") }}',
                        data: data,
                        dataType: 'json',
                        success: function(res){
                            deleteItens(photo.parentElement)
                        }
                    })
                })
            }
        }
        

        function deleteItens(...item){
            for(i of item){
                i.remove()
            }
        }

    </script>
@endsection