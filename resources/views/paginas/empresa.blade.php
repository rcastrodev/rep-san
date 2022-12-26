@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Nosotros</li>
		</ol>
	</div>
</div>
@if ($section1)
	<div class="py-3">
		<div class="container">
			<div class="row font-size-15 fw-light" style="color: #707070;">
				@if (Storage::disk('custom')->url($section1->image))
					<div class="col-sm-12 col-md-6 order-sm-2 order-md-1">
						<img src="{{ asset($section1->image) }}" class="img-fluid">
					</div>
				@endif
				<div class="col-sm-12 col-md-6 text-blue-dark order-sm-1 order-md-2">
					<h2 class="pb-2 mb-4 font-size-20" style="border-bottom: 1px solid #052B48;">{{$section1->content_1}}</h2>
					<div class="font-size-16" style="font-weight: 400;">
						{!! $section1->content_2 !!}
					</div>
				</div>
			</div>
		</div>
	</div>	
@endif
@endsection