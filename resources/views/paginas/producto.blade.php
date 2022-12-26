@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14 rMenu">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}" class="text-decoration-none">Inicio</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('categoria', ['id'=> $product->category->id]) }}" class="text-decoration-none">{{$product->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($categories as $c)
                        <li class="py-2 @if($c->id == $product->category->id) active @endif"> 
                            <a href="#" class="toggle d-block p-2 text-decoration-none  text-decoration-none text-blue-dark font-size-14">{{$c->name}}</a>
                            <ul class="mt-3 ps-0 {{ ($c->id == $product->category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($c->products as $cp)
                                    <li class="ps-4 py-2" style="@if($cp->id == $product->id) background-color: #DBDBDB5E; @endif">
                                        <a href="{{ route('producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none font-size-14 d-inline-block" style="@if($cp->id == $product->id) font-weight: bold; @endif">{{$cp->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                    @endforeach
                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    @foreach ($product->images as $k => $pi)
                                        <div class="carousel-item  @if(!$k) active @endif">
                                            <img src="{{ asset($pi->image) }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                            min-height: 240px; min-width: 100%; max-width: 100%; max-height: 240px;" alt="{{$product->name}}">
                                        </div>                                    
                                    @endforeach
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                    min-width: 100%; max-width: 100%;"> 
                                    </div>                                   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="col-sm-12">
                            @if ($product->code)
                                <span class="fw-bold text-primary">COD. {{ $product->code }}</span>
                            @endif
                            <h1 class="font-size-15 text-uppercase tex-blue-dark fw-bold mb-4 pb-2" style="
                            border-bottom: 1px solid #052B48;
                        ">{{ $product->name }}</h1>
                            @if ($product->possible_materials || $product->decription)
                                <div class="mb-sm-2 mb-md-5 font-size-15 table-responsive mb-5">
                                    <table>
                                        <tr>
                                            <td width="170">description:</td>
                                            <td>{{ $product->decription }}</td>
                                        </tr>
                                        <tr>
                                            <td>Materiales posibles:</td>
                                            <td>{{ $product->possible_materials }}</td>
                                        </tr>
                                    </table>
                                </div>         
                            @endif
                            @if (Storage::disk('custom')->exists($product->picture_description))
                                <div class="">
                                    <img src="{{ asset($product->picture_description) }}" class="img-fluid" width="180" height="180">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if (count($product->variableProducts))
                    <form action="{{ route('vp.store') }}" method="post" class="row mb-5">
                        @csrf
                        <div class="col-sm-12 table-responsive">
                            <table id="tableVP" class="table producto-variable text-blue-dark mb-4">
                                <thead class="text-uppercase">
                                    <tr class="font-size-15 text-center" style="vertical-align: middle;">
                                        <th scope="col" style="font-weight: 600 !important;">c&oacute;digo</th>
                                        <th scope="col" style="font-weight: 600 !important;">descripci&oacute;n</th>
                                        <th scope="col" style="font-weight: 600 !important;" width="120">solicitar <br> presupuesto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variableProducts as $vProduct)
                                        <tr>
                                            <td class="text-center">{{$vProduct->code}}</td>
                                            <td>{{$vProduct->description}}</td>
                                            <td class="text-center">
                                                <button class="btn bg-blue-dark text-white rounded-pill fw-bold addVP" 
                                                style="width: 110px;"
                                                data-url="{{ route('vp.store') }}" 
                                                data-id="{{$vProduct->id}}" 
                                                @if (count($product->images))
                                                    data-image="{{ asset($product->images()->first()->image) }}"
                                                @else
                                                    data-image="{{ asset('images/default.jpg') }}"
                                                @endif
                                                data-code="{{ $vProduct->code }}"
                                                data-name="{{ $product->name }}"
                                                data-description="{{ $vProduct->description }}"
                                                >cotizar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>                  
                @endif                 
            </section>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
