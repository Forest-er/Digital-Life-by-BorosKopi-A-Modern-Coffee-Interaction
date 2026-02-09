<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = categories::all();
        $products = Product::query()
            ->when($request->search, function ($query, $search) {
                return $query->where('product_name', 'like', "%{$search}%");
            })
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->latest()
            ->get();
        return view('product.menu', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::all();
        return view('product.insertMenu', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $product = new product();
        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity', 0);
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::where('product_id', $id)->firstOrFail();
        return view('product.updateMenu', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $product = product::where('product_id', $id)->firstOrFail();
        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity', 0);
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = product::where('product_id', $id)->firstOrFail();
        $imagePath = public_path('storage/' . $product->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product and image deleted successfully.');
    }
    public function kategori(){
        $categories = categories::all();
        return view('product.addCategories', compact('categories'));
    }
    public function kategoriInsert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,category_name',
        ]);
        $category = new categories();
        $category->category_name = $request->input('name');
        $category->save();
        return view('product.addCategories');
    }
    public function kategoriDelete(string $id){
        $category = categories::where('category_id', $id)->firstOrFail();
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
