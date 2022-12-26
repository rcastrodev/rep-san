@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio </a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section>
            <div class="container row py-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($categories as $c)
                        <li class="py-2 @if($c->name == $category->name) active @endif"> 
                            <a href="#" class="toggle d-block p-2 text-decoration-none  text-decoration-none text-blue-dark font-size-14 d-inline-block">{{$c->name}}</a>
                            <ul class="mt-3 p-0 {{ ($c->id == $category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($c->products as $cp)
                                    <li>
                                        <a href="{{ route('producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none ps-4 font-size-14 d-inline-block">{{$cp->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                    @endforeach
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14">
                    <div class="row">
                        @isset($products)
                            @foreach ($products as $p)
                                <div class="col-sm-12 col-md-4 mb-3">
                                    @include('paginas.partials.producto', ['p' => $p])
                                </div>
                            @endforeach                    
                        @endisset
                    </div>

                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush


