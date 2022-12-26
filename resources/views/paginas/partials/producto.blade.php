<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas position-absolute text-decoration-none text-white" style="font-size: 70px; font-weight: 100; background-color: #3d709c7a;">+</a>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0 fw-bold">
            <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="font-size-14 text-blue text-decoration-none fw-normal">{{ Str::limit($p->name, 40) }}</a>
        </p>
    </div>
</div>