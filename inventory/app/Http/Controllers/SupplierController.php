<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
       
        $supplier = Supplier::all();

        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required'
        ]);

       
        Supplier::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat
        ]);

        //redirect to index
        return redirect()->route('supplier.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'   => 'required'
        ]);


            //update post without image
            $supplier->update([
                'nama'     => $request->nama,
                'alamat'   => $request->alamat,
            ]);
        

        //redirect to index
        return redirect()->route('supplier.index');
    }

    public function destroy(Supplier $supplier)
    {
        
        $supplier->delete();

        //redirect to index
        return redirect()->route('supplier.index');
    }

}
