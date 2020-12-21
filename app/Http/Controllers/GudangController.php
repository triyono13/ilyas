<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Gudang;

class GudangController extends Controller
{
    public function index()
    {
        $gudang = Gudang::paginate(10);
        return view ('admin.gudang.index', compact('gudang'));
    }

    public function store(Request $request)
    {
        $gudang = Gudang::create([
            'nama_item' => $request->name,
            'stock' => $request->stock,
            'harga' => $request->harga
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->back();
    }

    public function edit($id)
    {
        $gudang = Gudang::find($id);
        return view ('admin.gudang.edit', compact('gudang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        $gudang_data = [
            'nama_item' => $request->name,
            'stock' => $request->stock,
            'harga' => $request->harga
        ];

        Gudang::whereId($id)->update($gudang_data);
        alert()->success('Success','Data Berhasil Di Update !');
        return redirect()->back();
    }

    public function destroy($id)
    {   
        $gudang = Gudang::find($id);
        $gudang->delete();
        return redirect()->back()->with('success', 'Item berhasil di Hapus');
    }

}
