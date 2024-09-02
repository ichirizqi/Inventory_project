<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;


class KategoriController extends Controller
{
    public function index()
    {
       
        $kategori = Kategori::all();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required'
        ]);

       
        Kategori::create([
            'nama'     => $request->nama
        ]);

        //redirect to index
        return redirect()->route('kategori.index');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required'
        ]);


            //update post without image
            $kategori->update([
                'nama'     => $request->nama
            ]);
        

        //redirect to index
        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategori.index');
    }

}
