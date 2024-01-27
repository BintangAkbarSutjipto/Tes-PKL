<?php

namespace App\Http\Controllers;

use ErrorException;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('Transaksi1.indextransaksi', compact('Transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Transaksi1.createtransaksi",);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $transaksi = new transaksi;
            $transaksi->name = $request->name;
            $transaksi->date= $request->date;
            $transaksi->quantity= $request->quantity;
            $transaksi->save();

            Session::flash('success','transaksi Berhasil ditambah !');
            return redirect()->route('transaksi1.indextransaksi');

        }   catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = transaksi::find($id);
        return view('transaksi1.edittransaksi', compact('transaksi'));
            
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        

            $transaksi = transaksi::find($id);
            $transaksi->name = $request->name;
            $transaksi->date= $request->date;
            $transaksi->quantity= $request->quantity;
            
            $transaksi->save();

            Session::flash('success','transaksi Berhasil diupdate !');
            return redirect()->route('transaksi1.indextransaksi');

        }   
                    
        
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi1 = transaksi::find($id);
        
        $transaksi1->delete($id);
       
        Session::flash('success','transaksi Berhasil dihapus !');
            return redirect()->route('transaksi1.index');
        
    }
}
