<?php

namespace App\Http\Controllers;

use ErrorException;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('product.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Product.create",);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $produk = new Produk;
            $produk->name = $request->name;
            $produk->price= $request->price;
            $produk->save();

            Session::flash('success','Produk Berhasil ditambah !');
            return redirect()->route('produk.index');

        }   catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('product.edit', compact('produk'));
            
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        

            $produk = Produk::find($id);
            $produk->name =$request->name;
            $produk->price =$request->price;
            
            $produk->save();

            Session::flash('success','Produk Berhasil diupdate !');
            return redirect()->route('produk.index');

        }   
                    
        
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        
        $produk->delete($id);
       
        Session::flash('success','Produk Berhasil dihapus !');
            return redirect()->route('produk.index');
        
    }
}
