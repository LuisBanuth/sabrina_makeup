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
                    <label for="filepond">Fotos</label>
                    <ul>
                        @foreach($product->photos as $photo)
                        <li>
                            <label>
                                <input value="{{$photo->path}}" data-type="local" checked type="checkbox">
                                foo.jpeg
                            </label>
                        </li>
                        @endforeach
                    </ul>
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
        const pond = FilePond.create(inputElement, {maxFiles: 10,}   );
        const urlFilePond = '/sabrina/public/filepond/'; //alterar na versão final

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
                        dataType: 'json',
                        success: function(res){
                            //excludeIfInactive(res)
                        }
                    });

                    error('Erro');

                    load();
                },
                load: (source, load, error, progress, abort, headers) => {
                    @foreach($product->photos as $photo)
                        // Should request a file object from the server here
                        $.ajax({
                            type: 'GET',
                            url: urlFilePond + 'load/' + {{$photo->path}},
                            dataType: 'json',
                            success: function(res){
                                console.log(res)
                            }
                        });
                    @endforeach

                    // Can call the error method if something is wrong, should exit after
                    error('oh my goodness');

                    // Can call the header method to supply FilePond with early response header string
                    // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/getAllResponseHeaders
                    headers(headersString);

                    // Should call the progress method to update the progress to 100% before calling load
                    // (endlessMode, loadedSize, totalSize)
                    progress(true, 0, 1024);

                    // Should call the load method with a file object or blob when done
                    load(file);

                    // Should expose an abort method so the request can be cancelled
                    return {
                        abort: () => {
                            // User tapped cancel, abort our ongoing actions here

                            // Let FilePond know the request has been cancelled
                            abort();
                        }
                    };
                }
            }
        });

        // function excludeIfInactive(id){
        //     setTimeout(){
        //         $.ajax({
        //             type: 'DELETE',
        //             url: urlFilePond + 'inactive',
        //             data: id,
        //             dataType: 'json',
        //         });
        //     }
        // } 
    </script>
@endsection