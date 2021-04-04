<?php

namespace App\Http\Controllers\admin;

use App\admin\BrandProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $brandproducts=BrandProduct::all();
        return view("admin.brandproduct.index",compact('brandproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.brandproduct.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('image');
        $img_name=$file->getClientOriginalName();
        $file->move('images',$img_name);
        $brandproduct=new BrandProduct();
        $brandproduct->name=$request->name;
        $brandproduct->image=$img_name;
        $brandproduct->save();
        if(isset($request->save)){
            return redirect()->route('admin.brandproduct.edit',$brandproduct->id);
        }
        else{
            return redirect()->route("admin.brandproduct.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brandproduct=BrandProduct::find($id);
        return view('admin.brandproduct.show',compact('brandproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandproduct=BrandProduct::find($id);
        return view('admin.brandproduct.edit',compact('brandproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brandproduct=BrandProduct::find($id);
        $file=$request->file('image');
        if($file){
            $img_name=$file->getClientOriginalName();
            $file->move('images',$img_name);
        }
        else{
            $img_name=$brandproduct->image;
        }
        
        $brandproduct->name=$request->name;
        $brandproduct->image=$img_name;
        $brandproduct->save();
        if(isset($request->save)){
            return redirect()->route('admin.brandproduct.edit',$brandproduct->id);
        }
        else{
            return redirect()->route("admin.brandproduct.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandproduct=BrandProduct::find($id);
        $image_path='images/'.$brandproduct->image;
        File::delete($image_path);
        BrandProduct::find($id)->delete();
        return redirect()->route('admin.brandproduct.index');
    }
}