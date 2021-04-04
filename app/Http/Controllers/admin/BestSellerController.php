<?php

namespace App\Http\Controllers\admin;

use App\admin\BestSeller;
use App\admin\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BestSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestsellers=BestSeller::all();
        return view('admin.bestseller.index',compact('bestsellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts=Post::all();
        return view('admin.bestseller.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bestseller=new BestSeller();
        $bestseller->post_id=$request->pname;
        $bestseller->save();
        if(isset($request->save)){
            return redirect()->route('admin.bestseller.edit',$bestseller->id);
            }
            else{
                return redirect()->route('admin.bestseller.index');
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
        $bestseller=BestSeller::find($id);
        $posts= Post::all();
        return view('admin.bestseller.show',compact('bestseller','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bestseller=BestSeller::find($id);
        $posts= Post::all();
        return view('admin.bestseller.edit',compact('bestseller','posts'));
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
        $bestseller=BestSeller::find($id);
        $bestseller->post_id=$request->pname;
        $bestseller->save();
        if(isset($request->save)){
            return redirect()->route('admin.bestseller.edit',$bestseller->id);
            }
            else{
                return redirect()->route('admin.bestseller.index');
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
        BestSeller::find($id)->delete();
        return redirect()->route('admin.bestseller.index');
    }
}