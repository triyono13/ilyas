<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agen;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::paginate(10);
        return view ('admin.agen.index', compact('agen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.agen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required',
            'telp' => 'required',
            'fb' => 'required',
            'ig' => 'required',
            'shopee' => 'required',
            'wilayah' => 'required'
        ]);

        $agen = Agen::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => date("Y-m-d", strtotime($request->tanggal)),
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,    
            'kode_pos' => $request->kode_pos,
            'telp' => $request->telp,
            'fb' => $request->fb,
            'ig' => $request->ig,
            'shopee' => $request->shopee,
            'wilayah' => $request->wilayah
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->route('agen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agen = Agen::find($id);
        return view ('admin.agen.detail', compact('agen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find($id);
        return view ('admin.agen.edit', compact('agen'));
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
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required',
            'telp' => 'required',
            'fb' => 'required',
            'ig' => 'required',
            'shopee' => 'required',
            'wilayah' => 'required'
        ]);

        $agen_data = [
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,    
            'kode_pos' => $request->kode_pos,
            'telp' => $request->telp,
            'fb' => $request->fb,
            'ig' => $request->ig,
            'shopee' => $request->shopee,
            'wilayah' => $request->wilayah
        ];

        Agen::whereId($id)->update($agen_data);
        alert()->success('Success','Data Berhasil Di Update !');
        return redirect()->route('agen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agen = Agen::find($id);
        $agen->delete();
        return redirect()->back()->with('success', 'Data Reseller berhasil di Hapus');
    }
}
