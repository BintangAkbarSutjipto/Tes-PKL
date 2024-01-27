<?php

namespace App\Http\Controllers;

use ErrorException;

use App\Models\transaksi1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Transaksi1Controller extends Controller
{
    public function index()
    {
        $transaksi1 = transaksi1::all();
        return view('transaksi1.indextransaksi', compact('transaksi1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("transaksi1.createtransaksi",);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $transaksi1 = new transaksi1;
            $transaksi1->name = $request->name;
            $transaksi1->date = $request->date;
            $transaksi1->quantity = $request->quantity;
            $transaksi1 ->save();

            Session::flash('success','Produk Berhasil ditambah !');
            return redirect()->route('transaksi1.index');

        }   catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi1 $transaksi1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi1 = transaksi1::find($id);
        return view('transaksi1.edittransaksi', compact('transaksi1'));
            
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        

        $transaksi1 = transaksi1::find($id);
        $transaksi1->name = $request->name;
            $transaksi1->date = $request->date;
            $transaksi1->quantity = $request->quantity;
            $transaksi1->save();

        Session::flash('success','Produk Berhasil diupdate !');
        return redirect()->route('transaksi1.index');
       
        if (!$transaksi1 = transaksi1::find($id)) {
            Session::flash('error','Record not found!');
            return redirect()->route('transaksi1.index');
        }
    
    }   
                    
        
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi1 = transaksi1::find($id);
        
        $transaksi1->delete($id);
       
        Session::flash('success','Produk Berhasil dihapus !');
            return redirect()->route('transaksi1.index');
        
    }
}
