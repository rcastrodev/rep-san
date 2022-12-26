<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));

        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        $categories = Category::where('outstanding', 1)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('section1s', 'section2', 'section3', 'categories'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        SEO::setTitle('nosotros');
        SEO::setDescription(strip_tags($section1->content_2));
        return view('paginas.empresa', compact('section1'));
    }

    public function categorias()
    {
        $categories = Category::orderBy('order', 'ASC')->get();    
        SEO::setTitle('categor&iacute;as');    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.categorias', compact('categories'));
    }

    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        $categories = Category::all();
        
        SEO::setTitle($category->name);    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::all();
        if ($product) 
            SEO::setTitle($product->name);

        $relatedProducts = $product->category->products()->where('id', '<>', $product->id)->inRandomOrder()->get();
        if(count($relatedProducts) > 2)
            $relatedProducts = $relatedProducts->take(3);
        
        $vps = session('vps');
        
        return view('paginas.producto', compact('product', 'categories', 'relatedProducts', 'vps'));
    }


    public function productos(Request $request)
    {
        if (! $request->get('b')) abort(404); 
        $b = $request->get('b');
        $products = Product::where('name', 'like', "%{$b}%")->get();        
        return view('paginas.productos', compact('products'));
    }
    
    public function descargas()
    {
        $page = Page::where('name', 'descargas')->first();
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description));
        $sections = $page->sections;
        $downloads = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('downloads'));
    }

    public function cotizacion()
    {
        $page = Page::where('name', 'cotizacion')->first();
        SEO::setTitle("cotizaci&oacute;n");
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.cotizacion');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function catalogo($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_2);  
    }
}
