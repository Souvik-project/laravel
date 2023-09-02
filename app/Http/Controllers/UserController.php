<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function homelayout()
	{
		return view ('user.layout.homelayout');
	}
    public function index()
	
    {
        $products = Product::all();
        return view ('user.layout.index', compact ('products'));
    }
	 public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.layout.show', compact('product'));
	
    }
	 public function cart($id)
    {
        
        $cartItems = Cart::where('productid', $id)->get();
        return view('user.layout.cart', compact('cartItems'));
    
	}
    
	 
	 public function add(Request $request) 
    {
        $productid = $request->input('productid');
        $product = Product::find($productid);

        if (!$product)
		{
            return redirect()->back()->with('error', 'Product not found');
        }
		$existingCartItem = Cart::where('productid', $productid)->first();

       if ($existingCartItem) 
	    {
            $existingCartItem->increment('quantity');
        } 
		else 
		{
			$quantity = $request->input('quantity');
            $cartItem = Cart::create([
                'productid' => $productid,
                'pname' => $product->pname,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity, // Initial quantity when adding a product
            ]);
        }

        return redirect()->route('user.layout.cart', ['id' => $productid])->with('success', 'Product added to cart');
	   
	   
    }
	public function remove($id)
	{
		 $cartItem = Cart::findOrFail($id);
		  $cartItem->delete();
		  return redirect()->route('user.layout.index');
		
		
	}
	   




}
