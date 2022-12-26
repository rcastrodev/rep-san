@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Productos</li>
		</ol>
	</div>
</div>
@isset($categories)
	@if (count($categories))
        <section class="py-3">
            <div class="container row mx-auto">
                @foreach ($categories as $c)
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-5">
                        @includeIf('paginas.partials.categoria', ['c' => $c])
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection