<?php

namespace App\Http\Controllers\user;

use App\admin\Order;
use App\admin\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user\Cart;

class CartController extends Controller
{
    public function orderTemp(request $request,$id){
        $post=Post::find($id);
       $cart=session()->get('cart');
       if(!$cart){
           $cart=[
                [
                   'id'=>$post->id,
                   'name'=> $post->name,
                   'quantity'=>$request->count,
                   'image'=>$post->image,
                   'price'=>$post->price
                ]
               ];
               session()->put('cart',$cart);
               if(isset($request->order)){
                return redirect()->route('user.order')->with('success',"Add to order");
            
            }
            elseif (isset($request->addList)){
                $request->session()->flash('status', 'Task was successful!');
                return redirect()->route('user.productdetail',$post->id);
            
            }
       }
       for($i=0;$i<count($cart);$i++){
          if(($cart[$i]['id']==$post->id)){
            $cart[$i]['quantity']=$cart[$i]['quantity']+$request->count;
            session()->put('cart',$cart);
            if(isset($request->order)){
                return redirect()->route('user.order')->with('success',"Add to order");
            }
            else{
                $request->session()->flash('status', 'Task was successful!');
                return redirect()->route('user.productdetail',$post->id); 
            }
          } 
       }
       $cart[]=[
        'id'=>$post->id,
        'name'=> $post->name,
        'quantity'=>$request->count,
        'image'=>$post->image,
        'price'=>$post->price  
       ];
       session()->put('cart',$cart);
        if(isset($request->order)){
            return redirect()->route('user.order')->with('success',"Add to order");

        }
        elseif (isset($request->addList)){
            $request->session()->flash('status', 'Task was successful!');
            return redirect()->route('user.productdetail',$post->id);
        }
}
    public function order(){
        return view('user.order');
    }
    public function orderRemove($id){
      $cart= session()->get('cart');
      if(isset($cart[$id])){
         unset($cart[$id]);
          session()->put('cart',$cart);
      }
      if($cart==[]){
        session()->forget('cart'); 
      }
      return redirect()->route('user.order')->with('success',"Add to order");
    }

    public function orderSubmit(request $request){
       if(session()->has('cart')){
           $carts= session()->get('cart');
           for($i=0;$i<count($carts);$i++){
            $this->validate($request,[
                'cname' =>'required',
                'phone' =>'required',
            ]);
            $order=new Order();
            $order->cname= $request->cname;
            $order->phone= $request->phone;
            $order->instock=$carts[$i]['quantity'];
            $order->post_id=$carts[$i]['id'];
            $order->status='Pending';
            $order->save();        
           }
           session()->forget('cart');
       }
        return redirect()->route('user.order');
    }
}