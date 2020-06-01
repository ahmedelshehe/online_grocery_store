<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
Use Alert;
class UserProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session()->has('success')){
            Alert::toast(session('success'), 'success');
        }
        
        $products=Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product=Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($id, $request->qty);
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cart = new Cart(session()->get('cart'));
        $cart->remove($id);

        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product was removed');
    }
    public function addToCart(Request $request,$id){
        $qty=$request->quantity;
        $product=Product::find($id);
        if(session()->has('cart')){
            $cart=new Cart(session()->get('cart'));
        }else{
            $cart=new Cart();
           
        }
        $cart->add($product,$qty);
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product was Added to cart');
    }
    public function showCart(){
        if(session()->has('cart')){
            $cart=new Cart(session()->get('cart'));
        }else{
            $cart=null;
        }
        
        return view('products.cart',compact('cart'));

    }
    
    public function checkout($amount)
    {
        return view('products.checkout',compact('amount'));
    }
    public function charge(Request $request)
    {
        //dd($request->stripeToken);
        $charge=Stripe::charges()->create([
            'currency'=>'USD',
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
        ]);
        if ($charge['id']){
            auth()->user()->orders()->create([
                'cart'=>serialize(session()->get('cart')),
                
            ]);
            
            session()->forget('cart');
            return redirect()->route('products.index')->with('success','Payment Succesful !');
        }else{
            return redirect()->back();

        }
    }
}
