<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GudangAgen;

class GudangAgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang = GudangAgen::paginate(10);
        return view ('admin.gudang_agen.index', compact('gudang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gudang = GudangAgen::create([
            'nama_item' => $request->name,
            'stock' => $request->stock,
            'harga' => $request->harga
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->back();
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
        $gudang = GudangAgen::find($id);
        return view ('admin.gudang_agen.edit', compact('gudang'));
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

        GudangAgen::whereId($id)->update($gudang_data);
        alert()->success('Success','Data Berhasil Di Update !');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = GudangAgen::find($id);
        $gudang->delete();
        return redirect()->back()->with('success', 'Item berhasil di Hapus');
    }
}
