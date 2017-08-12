<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('items.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'code'  => 'required',
            'title'  => 'required',
            'image' => 'required',
            'format' => 'required',
            'price' => 'required|integer'
        ]);

        // Store input to database
        $product = new Product();
        $product->code      = $request->input('code');
        $product->title     = $request->input('title');
        $product->format    = $request->input('format');
        $product->price     = $request->input('price');
        $product->pro_major = $request->input('pro_major');
        $product->pro_minor = $request->input('pro_minor');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_random(5) . '.' . $image->getClientOriginalName();
            $location = public_path('upload/images/' . $filename);
            // Resize and save the big image
            Image::make($image)->resize(154, 154)->save($location);
            $product->image = $filename;
        } else {

        }
        $product->save();

        Session::flash('success', 'Thêm sản phẩm thành công');

        // Redirect to other page
        return redirect()->route('items.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post
        $product = Product::find($id);
        //return view
        return view('items.edit')->withProduct($product);
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
        // Validate input
        $this->validate($request, [
            'code'  => 'required',
            'title'  => 'required',
            'format' => 'required',
            'price' => 'required|integer',
            'pro_major' => 'integer',
            'pro_minor' => 'integer'
        ]);

        // Store input to database
        $product = Product::find($id);
        $product->code      = $request->input('code');
        $product->title     = $request->input('title');
        $product->format    = $request->input('format');
        $product->price     = $request->input('price');
        $product->pro_major = $request->input('pro_major');
        $product->pro_minor = $request->input('pro_minor');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_random(5) . '.' . $image->getClientOriginalName();
            $location = public_path('upload/images/' . $filename);
            // Resize and save the big image
            Image::make($image)->resize(154, 154)->save($location);
            $product->image = $filename;
        }
        $product->save();

        Session::flash('success', 'Sửa sản phẩm thành công');

        // Redirect to other page
        return redirect()->route('items.index');
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
        $product->delete();
        Session::flash('success', 'Xóa sản phẩm thành công.');
        return redirect()->route('items.index');
    }
}
