<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $categories = Category::all();        
        return view('administrator.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('picture_description')) 
            $data['picture_description'] = $request->file('picture_description')->store('images/picture_description', 'custom');

        $product = Product::create($request->all());                    
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
 
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 3 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'categories', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {   
        $data = $request->all();

        if (! $request->has('outstanding'))
            $data['outstanding'] = 0;
        
        $product = Product::find($request->input('id'));

        if($request->hasFile('picture_description')){
            if (Storage::disk('custom')->exists($product->picture_description))
                    Storage::disk('custom')->delete($product->picture_description);
            
            $data['picture_description'] = $request->file('picture_description')->store('images/picture_description', 'custom');
        }

        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        return DataTables::of(Product::query())
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function borrarImagenDescriptiva($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->picture_description))
            Storage::disk('public')->delete($product->picture_description);

        $product->picture_description = null;
        $product->save();

        return response()->json([], 200);
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);  
        return Response::download($producto->extra);  
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }
}
