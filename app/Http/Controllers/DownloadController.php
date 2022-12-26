<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    protected $page;

    public function __construct(){ 
        $this->page = Page::where('name', 'descargas')->first();
    }

    public function content()
    {
        return view('administrator.download.content');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/download', 'custom');

        if ($request->hasFile('content_2')) 
            $data['content_2'] = $request->file('content_2')->store('images/download', 'custom');
        
        $content = Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','custom');
        } 
        
        if($request->hasFile('content_2')){
            if(Storage::disk('custom')->exists($element->content_2))
                Storage::disk('custom')->delete($element->content_2);
            
            $data['content_2'] = $request->file('content_2')->store('images/home','custom');
        } 
        
        $element->update($data);
    }

    public function destroy($id)
    {
        Content::find($id)->delete();
        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $elements = $sectionSlider->contents()->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar element"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
