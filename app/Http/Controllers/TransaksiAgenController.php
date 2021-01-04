<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gudang;
use App\TransaksiAgen;
use App\Agen;

class TransaksiAgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::all();
        $gudang = Gudang::all();
        $transaksi = TransaksiAgen::paginate(10);
        return view ('admin.transaksi_agen.index', compact('transaksi', 'gudang','agen'));
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
        $this->validate($request, [
            'agen' => 'required',
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total' => 'required'
        ]);

        $transaksi = TransaksiAgen::create([
            'agen_id' => $request->agen,
            'gudang_id' => $request->item,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'jumlah_items' => $request->jumlah,
            'nominal' => $request->total
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $gudang = Gudang::all();
        $agen = Agen::all();
        $transaksi = TransaksiAgen::find($id);
        return view ('admin.transaksi_agen.edit', compact('transaksi', 'gudang','agen'));
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
            'agen' => 'required',
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total' => 'required'
        ]);

        $transaksi_data = [
            'agen_id' => $request->agen,
            'gudang_id' => $request->item,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'jumlah_items' => $request->jumlah,
            'nominal' => $request->total
        ];

        TransaksiAgen::whereId($id)->update($transaksi_data);
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
        $transaksi = TransaksiAgen::find($id);
        $transaksi->delete();
        return redirect()->back()->with('success', 'Item berhasil di Hapus');
    }

    public function findHarga(Request $request)
    {
        $p=Gudang::select('harga')->where('id',$request->id)->first();
    	return response()->json($p);

    }
}
