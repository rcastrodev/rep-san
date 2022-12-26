@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Descargas</li>
		</ol>
	</div>
</div>
@isset($downloads)
	@if (count($downloads))
        <section class="py-3">
            <div class="container row mx-auto">
                @foreach ($downloads as $d)
                    <div class="col-sm-12 col-md-4 mb-5">
                        <div class="card producto" style="border: none; box-shadow: none;">
                            <div class="position-relative">  
                                @if (Storage::disk('custom')->url($d->image))
                                    <img src="{{ asset($d->image) }}" class="img-fluid img-product" >
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
                                @endif
                            </div>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="card-text mb-0 font-size-14 text-blue-dark" style="font-weight: 600 !important;">{{ $d->content_1}}</p>
                                <div class="d-flex">
                                    {{-- <a href="#" class="p-2 bg-blue"><i class="fas fa-eye text-white"></i></a> --}}
                                    @if ($d->content_2)
                                        <a href="{{ route('catalogo', ['id'=> $d->id]) }}" class="p-2 bg-blue-dark"><i class="fas fa-download text-white"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection