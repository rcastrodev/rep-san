@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide rMenu position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="text-uppercase text-white fw-light">{{ $v->content_1 }}</h2>
							<h2 class="fw-bold text-white text-uppercase" style="font-size: 42px;">{{ $v->content_2 }}</h2>
						</div>
					</div>
				@endforeach
			</div>
			@if (Storage::disk('custom')->url($section2))
				<img src="{{ asset($section2->image) }}" class="img-fluid d-sm-none d-md-block" style="max-width: 123px; max-height: 123px;
				min-height: 123px; min-width: 123px; position: absolute; right: 40px; bottom: -53px;">
			@endif
		</div>		
	@endif
@endisset
@isset($categories)
	@if (count($categories))
	<section>
		<div class="container row mx-auto mt-5">
			<h2 class="mb-5 text-uppercase font-size-23 text-blue col-sm-12">Productos destacados</h2>
			@foreach ($categories as $c)
				<div class="col-sm-12 col-md-6 mb-5">
					@includeIf('paginas.partials.categoria', ['c' => $c])
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section3)
	<section class="mb-5" style="background-image: url({{ asset($section3->image) }}); min-height: 275px;">
		<div class="container d-flex align-items-center" style="min-height: 275px; line-height: 45px;">
			<div class="text-white text-center font-size-22">
				{!! $section3->content_1 !!}
			</div>
		</div>
	</section>
@endisset
@endsection