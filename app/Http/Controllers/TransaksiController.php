<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Reseller;
use App\Gudang;
use DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $reseller = Reseller::all();
        $gudang = Gudang::all();
        $transaksi = Transaksi::paginate(10);
        return view ('admin.transaksi.index', compact('transaksi', 'gudang','reseller'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'reseller' => 'required',
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total' => 'required'
        ]);

        $transaksi = Transaksi::create([
            'reseller_id' => $request->reseller,
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
        $reseller = Reseller::all();
        $transaksi = Transaksi::find($id);
        return view ('admin.transaksi.edit', compact('transaksi', 'gudang','reseller'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'reseller' => 'required',
            'item' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total' => 'required'
        ]);

        $transaksi_data = [
            'reseller_id' => $request->reseller,
            'gudang_id' => $request->item,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'jumlah_items' => $request->jumlah,
            'nominal' => $request->total
        ];

        Transaksi::whereId($id)->update($transaksi_data);
        alert()->success('Success','Data Berhasil Di Update !');
        return redirect()->back();
    }

    public function destroy($id)
    {   
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->back()->with('success', 'Item berhasil di Hapus');
    }

    public function findPrice(Request $request)
    {
        $p=Gudang::select('harga')->where('id',$request->id)->first();
    	return response()->json($p);

    }
}
