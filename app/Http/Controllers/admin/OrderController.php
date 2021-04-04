<?php

namespace App\Http\Controllers\admin;

use App\admin\Order;
use App\admin\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::paginate(10);
        $posts=Post::all();
        return view('admin.order.index',compact('orders','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts=Post::all();
        return view('admin.order.create',compact('posts'));
    }

    public function search(Request $request){
       
        $search=$request->search;
        $orders=Order::where('cname', 'like','%'.$search.'%')->with('post')->orWhereHas('post',function($query) use ($search){
            $query->where('name', 'like','%'.$search.'%');
        })->paginate(10);;
        return view('admin.order.index',compact('orders'));
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
            'cname'=>'required',
            'instock'=>'required',
            'phone'=>'required'
        ]);
        $order=new Order();
        $order->cname=$request->cname;
        $order->phone=$request->phone;
        $order->post_id=$request->pname;
        $order->instock=$request->instock;
        $order->status=$request->status;
        $order->save();
        if(isset($request->save)){
            return redirect()->route('admin.order.edit',$order->id);
            }
            else{
                return redirect()->route('admin.order.index');
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
        $order=Order::find($id); 
        $posts=Post::all();
        return view('admin.order.show',compact('order','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        $posts=Post::all();
        return view('admin.order.edit',compact('order','posts'));
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
        $order=Order::find($id);
        $order->cname=$request->cname;
        $order->phone=$request->phone;
        $order->post_id=$request->pname;
        $order->instock=$request->instock;
        $order->status=$request->status;
        $order->save();
        if(isset($request->save)){
            return redirect()->route('admin.order.edit',$order->id);
            }
            else{
                return redirect()->route('admin.order.index');
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
        Order::find($id)->delete();
        return redirect()->route('admin.order.index');
    }
    public function customer(){
        $orders=DB::table('orders')->select('cname')->groupBy('cname')->get();
        return view('admin.order.customer',compact('orders'));
    }
    public function newOrder(){
        $orders=Order::where('status','=','Pending')->paginate(10);
        return view('admin.order.index',compact('orders'));
    }
}