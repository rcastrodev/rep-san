<footer class="py-sm-2 py-md-3 font-size-15 text-sm-center text-md-start" style="border-top: 8px solid #052B48;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block img-fluid">
            </div>
            <div class="col-sm-12 col-md-4 d-sm-none d-md-block">
                <h6 class="text-uppercase text-blue-dark fw-bold mb-3">secciones</h6>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-blue">Home</a>
                        <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-blue">Nosotros</a>
                        <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-blue">prosuctos</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-blue">Descargas</a>
                        <a href="{{ route('cotizacion') }}" class="d-block text-uppercase text-decoration-none text-blue">Solicitar presupuesto</a>
                        <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-blue">contacto</a>
                    </div>
                </div>                
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-blue-dark fw-bold mb-3">contacto</h6>
                    <div class="d-flex text-white">
                        <i class="fas fa-map-marker-alt d-block me-3 mb-3 text-blue-dark"></i><span class="d-block text-blue"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex text-white">
                        <i class="fas fa-envelope d-block me-3 mb-3 text-blue-dark"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" class="text-blue underline">{{ $data->email }}</a>
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-phone-alt d-block me-3 mb-3 text-blue-dark"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0]}}" class="text-blue underline">{{ $phone[1] }}</a>  
                        @else 
                            <a href="tel:{{ $data->phone1}}" class="text-blue underline">{{ $data->phone1 }}</a>  
                        @endif     
                    </div>  
                </div>
            </div>
        </div>
    </div>
</footer>
@isset($data->phone2)
    @if (count($phone) == 2)
        <a href="https://wa.me/{{$phone[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>      
    @else 
        <a href="https://wa.me/{{$data->phone2}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>     
    @endif   
@endisset