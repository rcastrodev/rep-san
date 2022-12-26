@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Contacto</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.7751964141617!2d-58.32961038514598!3d-34.68562276934263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a332ff47705c07%3A0xde6862d312045cf5!2sCarlos%20Gardel%204445%2C%20B1874CLD%20Villa%20Dominico%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses-419!2smx!4v1635195562176!5m2!1ses-419!2smx" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
<div class="my-5">
    <div class="container">
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
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <h2 class="text-blue-dark font-size-14 text-uppercase mb-4 pb-2" style="border-bottom: 1px solid #3D709C;">Contacto</h2>
                    <p class="mb-4">Para mayor informaci&oacute;n, no dude en contactarse con nosotros mediante el siguiente formulario, o a trav&eacute;s de nuestras v&iacute;as de comunicaci&oacute;n.</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-blue-dark d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope text-blue-dark d-block me-3"></i><span class="d-block"></span>  
                        <a href="mailto:{{ $data->email }}" class="underline text-blue-dark">{{ $data->email }}</a>                      
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt text-blue-dark d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-blue-dark">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-blue-dark">{{ $data->phone1 }}</a>
                        @endif              
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5" placeholder="Escriba un mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn bg-blue-dark font-size-14 py-2 px-4 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
