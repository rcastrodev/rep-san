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
@isset($products)
    <div>
        <div class="container">
            <div class="">
                @if ($products->count())
                    <section class="producto row font-size-14 my-3">
                        @foreach ($products as $p)
                            <div class="col-sm-12 col-md-3 mb-3">
                                @includeIf('paginas.partials.producto', ['product' => $p])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos productos cargados en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
