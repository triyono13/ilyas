<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reseller;

class ResellerController extends Controller
{
    public function index()
    {
        $reseller = Reseller::paginate(10);
        return view ('admin.resellers.index', compact('reseller'));
    }

    public function create()
    {
        return view ('admin.resellers.create');
    }

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
            'agen' => 'required',
            'wilayah' => 'required'
        ]);

        $reseller = Reseller::create([
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
            'nama_agen' => $request->agen,
            'wilayah' => $request->wilayah
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->route('admin.resellers.index');
    }

    public function show($id)
    {
        $reseller = Reseller::find($id);
        return view ('admin.resellers.detail', compact('reseller'));
    }
    
    public function edit($id)
    {
        $reseller = Reseller::find($id);
           return view ('admin.resellers.edit', compact('reseller'));
    }

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
            'agen' => 'required',
            'wilayah' => 'required'
        ]);

        $reseller_data = [
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
            'nama_agen' => $request->agen,
            'wilayah' => $request->wilayah
        ];

        Reseller::whereId($id)->update($reseller_data);
        alert()->success('Success','Data Berhasil Di Update !');
        return redirect()->route('reseller.index');
    }

    public function destroy($id)
    {   
        $reseller = Reseller::find($id);
        $reseller->delete();
        return redirect()->back()->with('success', 'Data Reseller berhasil di Hapus');
    }
}
