<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $slug=$request->name;
        $slug=strtolower($slug);
        $slug=str_replace(" ","",$slug);
        $category->slug=$slug;
        $category->save();
        if(isset($request->save)){
            return redirect()->route('admin.category.edit',$category->id);
            }
            else{
                return redirect()->route('admin.category.index');
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
        $category=Category::find($id);
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        
        $this->validate($request,[
            'name'=>'required'
        ]);
        $category=Category::find($id);
        $category->name=$request->name;
        $slug=$request->name;
        $slug=strtolower($slug);
        $slug=str_replace(" ","",$slug);
        $category->slug=$slug;
        $category->save();
        if(isset($request->save)){
            return redirect()->route('admin.category.edit',$category->id);
            }
            else{
                return redirect()->route('admin.category.index');
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
        Category::find($id)->delete();
        return redirect()->route('admin.category.index');
    }
}