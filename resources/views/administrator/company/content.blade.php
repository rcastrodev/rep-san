@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
@isset($section1)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section1->content_1}}" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section1->content_2}}</textarea>
        </div>
        <div class="form-group">
            <small>imagen 590x560 px</small>
            <input type="file" name="image" class="form-control-file">
        </div>
        @if (Storage::disk('custom')->exists($section1->image))
            <div class="mb-3">
                <img src="{{ asset($section1->image) }}" class="img-fluid" width="400" height="200">
            </div>
        @endif
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

