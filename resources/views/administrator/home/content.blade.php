@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Pre título</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <form action="{{ route('home.update-info') }}" method="post" enctype="multipart/form-data" data-asyn="no">
        @csrf
        <input type="hidden" name="id" value="{{$sections2->id}}">
        <div class="form-group">
            <textarea name="content_1" class="ckeditor" cols="30" rows="10">{{ $sections2->content_1 }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control-file">
        </div>
        @if (Storage::disk('custom')->exists($sections2->image))
            <div class="mb-3">
                <img src="{{ asset($sections2->image) }}" class="img-fluid">
            </div>
        @endif
        <button class="btn btn-primary">Actualizar</button>
    </form>
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

