<div id="pre-header" class="d-sm-none d-md-block bg-blue font-size-12">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="py-2" style="z-index: 100;">
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-white me-1 text-white"></i> 
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    @if (count($phone) == 2)
                        <a href="tel:{{$phone[0]}}" class="text-white underline underline">{{ $phone[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-white underline underline">{{ $data->phone1 }}</a>
                    @endif
                </div>
                <div class="d-inline-block">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-white me-1"></i> {{ $data->email }}
                    </a>
                </div>
            </div>
            <div class="py-2" style="z-index: 100;">
                <form action="{{ route('productos') }}"  class="form-pre-header">
                    <div class="input-group">
                        <input type="text" name="b" class="form-control bg-transparent border-end-0 input-search" placeholder="Buscar ...">
                        <button type="submit" class="input-group-text bg-transparent border-start-0"><i class="fas fa-search text-white"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header d-sm-block d-md-none">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase" id="navbarNav">
            <ul class="navbar-nav justify-content-between align-items-center w-100 rMenu">
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('/')) position-relative active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('empresa')) position-relative active @endif" href="{{ route('empresa') }}">Nosotros</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('categorias') || Request::is('categoria/*') || Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative active @endif" href="{{ route('categorias') }}">Productos</a>
                </li>
                <li class="d-sm-none d-md-block">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header ">
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('descargas')) position-relative active @endif" href="{{ route('descargas') }}">Descargas</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('cotizacion') || Request::is('cotizacion/*')) position-relative active @endif" href="{{ route('cotizacion') }}">Solicitar presupuesto</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link @if(Request::is('contacto')) position-relative active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
