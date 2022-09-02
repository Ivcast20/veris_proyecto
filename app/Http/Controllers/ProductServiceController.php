<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\BiaProcess;
use App\Models\Category;
use App\Models\ProductService;

class ProductServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procesos_bia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $categories = Category::where('estado',1)->get();
        return view('admin.products.create', compact('procesos_bia','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        ProductService::create($request->validated());
        return redirect()->route('admin.products.index')->with(['message' => 'Se guardó el producto exitosamente']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductService  $productService
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductService $productService)
    {
        $categories = Category::where('estado',1)->pluck('nombre','id');
        return view('admin.products.edit',compact('productService','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductService  $productService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, ProductService $productService)
    {
        $productService->update($request->validated());
        return redirect()->route('admin.products.index')->with(['message' => 'Producto actualizado exitosamente']);
    }

}
