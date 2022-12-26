@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        
        <div class="form-group col-sm-12 col-md-8">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control select2">
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}" 
                        @if($category->id == $product->category_id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div> 

        <div class="form-group col-sm-12 col-md-4">
            <label>Imagen descriptiva</label>
            <input type="file" name="picture_description" class="form-control-file">
            @if ($product->picture_description)
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarImagenDescriptiva" data-url="{{ route('borrar-imagen-descriptiva', ['id'=> $product->id]) }}"></button>      
            @endif
        </div>    
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}">
        </div>
        <div class="form-group col-sm-12">
            <label>Materiales posibles</label>
            <input type="text" name="possible_materials" class="form-control" value="{{$product->possible_materials}}">
        </div>
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen <small>imagen 125x120 px</small></label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen <small>imagen 125x120 px</small></label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@includeIf('administrator.product.variable-product.index')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/admin/product/index.js') }}"></script>    --}}

    <script>
        let borrarImagenDescriptiva = document.getElementById('borrarImagenDescriptiva')
        if (borrarImagenDescriptiva) {
            borrarImagenDescriptiva.addEventListener('click', function(e) {
            e.preventDefault()
            axios.post(e.target.dataset.url)
            .then(r => r)
            .then(r => {
                e.target.remove()
            })
            .catch(e => console.log(new Error(e)))    
        })       
        }

    </script>
@stop

