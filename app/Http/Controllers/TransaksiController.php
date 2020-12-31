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
            'tanggal' => 'required'
        ]);

        $transaksi = Transaksi::create([
            'reseller_id' => $request->reseller,
            'gudang_id' => $request->item,
            'tanggal' => $request->jumlah,
            'jumlah_item' => $request->tanggal,
            'nominal' => $request->jumlah
        ]);
        alert()->success('Success','Data Berhasil Di Simpan !');
        return redirect()->back();
    }

    public function findPrice(Request $request)
    {
        $p=Gudang::select('harga')->where('id',$request->id)->first();
    	return response()->json($p);

    }
}
