@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Solicitar presupuesto</li>
		</ol>
	</div>
</div>
<div class="my-3">
    <div class="container">
        <form id="formQuote" action="{{ route('send-quote') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <span class="d-block">{{$error}}</span>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>  
                @endif
                @if (Session::has('mensaje'))
                    <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('mensaje') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                @endif
                <div class="col-sm-12 mb-3">
                    <img src="{{ asset('images/edit.png') }}" class="img-fluid me-2"> <label class="text-blue-dark fw-bold">DATOS PERSONALES</label>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ingresa el nombre *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="Ingresa su correo electrónico *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Ingrese su teléfono *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <input type="text" name="company" value="{{ old('company') }}" placeholder="Empresa *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-3 mt-5">
                    <img src="{{ asset('images/Grupo_3281.png') }}" class="img-fluid me-2"> <label class="text-blue-dark fw-bold">DETALLE DE PRODUCTOS</label>
                </div>   
                @if (session('vps'))
                    <div class="col-sm-12 table-responsive">
                        <table id="table"  class="table producto-variable font-size-14 mb-4">
                            <thead class="">
                                <tr class="text-uppercase text-center">
                                    <th scope="col" style="font-weight: 600 !important;" width="130">imagén</th>
                                    <th scope="col" style="font-weight: 600 !important;">Descripción</th>
                                    <th scope="col" width="120">Cantidad</th>
                                    <th scope="col" style="font-weight: 600 !important;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('vps') as $vp)
                                    <tr>
                                        <th>
                                            <img src="{{$vp['image']}}" width="80" class="d-block mx-auto">
                                        </th>
                                        <td>
                                            {{ $vp['description'] }}
                                            <input type="hidden" name="variableproduct[{{$vp['id']}}][name]" value="{{ $vp['name'] }}">
                                            <input type="hidden" name="variableproduct[{{$vp['id']}}][description]" value="{{ $vp['description'] }}">
                                            <input type="hidden" name="variableproduct[{{$vp['id']}}][code]" value="{{ $vp['code'] }}">
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" name="variableproduct[{{$vp['id']}}][value]" min="1" value="1" class="form-control">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary rounded-circle font-size-11 removeItem fas fa-times"
                                            data-url="{{ route('vp.destroy', ['id' => $vp['id']]) }}"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif             
                <div class="col-sm-12 mb-3 mt-5">
                    <img src="{{ asset('images/chat.png') }}" class="img-fluid me-2"> <label class="text-blue-dark fw-bold">COMENTARIOS</label>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-md-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Otros comentarios ..."></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-md-between justify-content-sm-center">
                <a href="{{ route('categorias') }}" class="text-uppercase btn text-white font-size-14 py-2 px-4 rounded-pill fw-bold mb-sm-3 mb-md-0 ancho-boton bg-blue"> <span>+</span> agregar más productos</a>
                <button type="submit" class="text-uppercase btn bg-blue-dark font-size-14 py-2 px-4 rounded-pill fw-bold mb-sm-3 mb-md-0 px-5 text-white">enviar solicitud</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush