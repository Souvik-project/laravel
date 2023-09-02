<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class MyController extends Controller
{
	
	public function create()
	{
		return view ('admin.create');
	}
     public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'pname' => 'required',
            'pdesc' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		
		 $input = $request->all();
    
		 if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
	
         Product::create($input);

        return redirect()->route('admin.index');
    }
	 public function index()
    {
        $products = Product::all();
        return view ('admin.index', compact ('products'));
    }
	
	
    public function datatable()
    {
        $products = Product::all();
        return view ('admin.datatable', compact ('products'));
    }
	public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact ('product'));
    }
	
	public function update(Request $request,$id)
    {
        $request->validate([
            'pname' => 'required',
            'pdesc' => 'required',
            'price' => 'required',
			
        ]);
		

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.index');
    }  
	 public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index');
    }
	

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.show', compact ('product'));
    }



}
