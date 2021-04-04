<?php

namespace App\Http\Controllers\admin;

use App\admin\Category;
use App\admin\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts=Post::paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.post.create',compact('categories'));
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
            'name'=>'required',
            'instock'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $file=$request->file('image');
        $img_name=$file->getClientOriginalName();
        $file->move('images',$img_name);
        $post=new Post();
        $post->name=$request->name;
        $post->category_id=$request->cname;
        $post->description=$request->description;
        $post->price=$request->price;
        $post->instock=$request->instock;
        $post->image=$img_name; 
        $slug=$request->name;
        $slug=strtolower($slug);
        $slug=str_replace(" ","",$slug);
        $post->slug=$slug;
        $post->save();
        if(isset($request->save)){
            return redirect()->route('admin.post.edit',$post->id);
        }
            else{
                return redirect()->route('admin.post.index');
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
        $categories= Category::all();
        $post=Post::find($id);
        return view('admin.post.show',compact('post','categories'));
    }
    public function search(Request $request){
       
        $search=$request->search;
        $posts=Post::where('name', 'like','%'.$search.'%')->with('category')->orWhereHas('category',function($query) use ($search){
            $query->where('name', 'like','%'.$search.'%');
        })->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $categories= Category::all();
        $post=Post::find($id);
        return view('admin.post.edit',compact('post','categories'));
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
            'name'=>'required',
            'instock'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $post=Post::find($id);
        $post->name=$request->name;
        $post->category_id=$request->cname;
        $post->description=$request->description;
        $post->price=$request->price;
        $post->instock=$request->instock;
        $file=$request->file('image');
        if($file){    
        $img_name=$file->getClientOriginalName();
        $file->move('images',$img_name);
        }
        else{
            $img_name= $post->image;
        }
        $post->image=$img_name; 
        $slug=$request->name;
        $slug=strtolower($slug);
        $slug=str_replace(" ","",$slug);
        $post->slug=$slug;
        $post->save();
        if(isset($request->save)){
            return redirect()->route('admin.post.edit',$post->id);
        }
            else{
                return redirect()->route('admin.post.index');
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
        $post=Post::find($id);
        $image_path='images/'.$post->image;
        File::delete($image_path);
        Post::find($id)->delete();
        return redirect()->route('admin.post.index');
    }
    public function indexPaging()
{
    $products = Post::paginate(5);

    return view('products.index-paging')->with('products', $products);
}
}