<?php

namespace App\Http\Controllers\user;

use App\admin\BestSeller;
use App\admin\BrandProduct;
use App\admin\Contact;
use App\admin\FeaturedProduct;
use App\admin\Post;
use App\admin\VisitorCount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user\Temporary;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    public function index(){
        $ip_addresses =VisitorCount::all();
        $bestseller=BestSeller::all();
        $featuredproducts =FeaturedProduct::orderBy('id','asc')->limit(8)->get();
        $posts=Post::all();
        $brand_products=BrandProduct::orderBy('id','asc')->get();
        $latest_products=Post::orderBy('id','desc')->limit(4)->get();
        return view('user.index',compact('brand_products','latest_products','posts','featuredproducts','bestseller','ip_addresses'));
    }
    public function product(){
        $post_num=1;
        $products=Post::orderBy('id','desc')->paginate(8);
        return view('user.product',compact('products','post_num'));
    }
    public function productGetSorting(Request $request){
        return redirect()->route('user.productSortBy',$request->sortBy);
    }
    public function productSortBy(request $request,$sortBy){
        if($sortBy=='date'){
            $sortBy='id';
        }
        if($sortBy=='type'){
            $sortBy='category_id';
        }
        $post_num=$sortBy;
        $products=Post::orderBy($sortBy,'asc')->paginate(8);
        return view('user.product',compact('products','post_num'));
    
    }
    public function productDetails($id){
        $post=Post::find($id);
        $products=Post::inRandomOrder()->orderBy('category_id','asc')->whereNotIn('id', [$id])->limit(4)->get();
        return view(' user.productdetail  ',compact('post','products'));
    }
    public function about(){
        return view('user.about');
    }
    public function contact(){
        return view('user.contact');
    }
    public function contactus(request $request){ 
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('user.contact');
    }
    public function loading(){
        return view('user.loading');
    }
    public function e404(){
        return view('user.404');
    }
 
        
}