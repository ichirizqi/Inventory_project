<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Auth;


class BarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('login'));
    }
    
    // public function kategori(Kategori $kategori){
    //     return view('barang.index', compact('kategori'));
    // }



    public function index()
    {
       
        $barang = Barang::with('kategori')->get();

        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $supplier = Supplier::all();
        return view('barang.create', compact ('kategoris', 'supplier'));
    }

    
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->nama = $request->input('nama');
        $barang->id_kategori = $request->input('id_kategori');
        $barang->id_supplier = $request->input('id_supplier');
        $barang->harga = $request->input('harga');
        $barang->qty = $request->input('qty');
        $barang->save();

        //redirect to index
        return redirect()->route('barang.index')->with('success', 'Produk created successfully.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $supplier = Supplier::all();
        return view('barang.edit', compact('barang', 'kategoris', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());
        $barang->update();

        

        //redirect to index
        return redirect()->route('barang.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        //redirect to index
        return redirect()->route('barang.index')->with('success', 'Produk deleted successfully.');
    }

}
