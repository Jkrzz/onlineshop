<?php

namespace App\Http\Controllers\admin;

use App\admin\FeaturedProduct;
use App\admin\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeaturedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $featuredproducts=FeaturedProduct::all();
        return view('admin.featuredproduct.index',compact('featuredproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts=Post::alL();
        return view('admin.featuredproduct.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $featuredproduct=new Featuredproduct();
        $featuredproduct->post_id=$request->pname;
        $featuredproduct->save();
        if(isset($request->save)){
            return redirect()->route('admin.featuredproduct.edit',$featuredproduct->id);
            }
            else{
                return redirect()->route('admin.featuredproduct.index');
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
        $featuredproduct=Featuredproduct::find($id);
        $posts= Post::all();
        return view('admin.featuredproduct.show',compact('featuredproduct','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featuredproduct=Featuredproduct::find($id);
        $posts= Post::all();
        return view('admin.featuredproduct.edit',compact('featuredproduct','posts'));
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
        $featuredproduct=FeaturedProduct::find($id);
        $featuredproduct->post_id=$request->pname;
        $featuredproduct->save();
        if(isset($request->save)){
            return redirect()->route('admin.featuredproduct.edit',$featuredproduct->id);
            }
            else{
                return redirect()->route('admin.featuredproduct.index');
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
        FeaturedProduct::find($id)->delete();
        return redirect()->route('admin.featuredproduct.index');
    }
}