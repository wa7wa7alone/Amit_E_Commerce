<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('products.id', 'DESC')->paginate(5);
        // join('categories','categories.id' , '=', 'category_id')->get('')
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_id = Category::select('id', 'name')->get();

        return view('admin.products.create',compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
            'image' => 'nullable|file|image|between:1,6000',
            'price' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        if (!empty($validated['image']))
            $validated['image'] = $request->file('image')->store('public/products');

        $product = Product::create($validated);


        return redirect(route('admin.products.index'))->with('success', __('products.created'));
    }

    /**
     *__() the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category_id = Category::select('id', 'name')->get();

        return view('admin.products.show', compact('product','category_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category_id = Category::select('id', 'name')->get();

        return view('admin.products.edit', compact('product','category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
            'price' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|file|image|between:1,6000',
        ]);
        $validated = array_filter($validated);

        if (!empty($validated['image'])) {
            // Delete Old image if not the default image
            if ($product->image != 'users/avatar.png') Storage::delete($product->image);
            // upload new image
            $validated['image'] = $request->file('image')->store('public/products');
        }

        $product->update($validated);

        return redirect(route('admin.products.index'))->with('success', __('products.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image != 'users/avatar.png') Storage::delete($product->image);
        Product::destroy($id);
        return redirect(route('admin.products.index'))->with('success', __('products.deleted'));
    }

    public function search(){
        $search_text = $_GET['query'];
        $products = Product::where('name','LIKE', '%'.$search_text.'%')->get() ;
        return view('user.search',compact('products'));
    }
}
