<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hari = date("l");
        $bulan = date("F");
        $tahun = date("Y");
        $pemasukkan = "pemasukkan";
        $pengeluaran = "pengeluaran";
        $hariini = date("d");
        $bulanini = date("m");
        $tahunini = date("Y");
        $hari_ini = DB::table('transaksi')->whereDay('tanggal', $hariini)->whereMonth('tanggal', $bulanini)->whereYear('tanggal', $tahunini)->sum('nominal');
        $bulan_ini = DB::table('transaksi')->whereMonth('tanggal', $bulanini)->whereYear('tanggal', $tahunini)->sum('nominal');
        $tahun_ini = DB::table('transaksi')->whereYear('tanggal', $tahunini)->sum('nominal');
        $semua_transaksi = DB::table('transaksi')->sum('nominal');
        $total_transaksi = DB::table('transaksi')->count();
        $total_reseller = DB::table('reseller')->count();
        $total_agen = DB::table('agen')->count();
        $total_barang = DB::table('gudang')->count();
        for($i = 1; $i < 13; $i++) {
            $chart_transaksi[$i] =  DB::table('transaksi')->whereMonth('tanggal', $i)->whereYear('tanggal', $tahunini)->sum('nominal');
        }
        $tahunan = DB::table('transaksi')->select(DB::raw('YEAR(tanggal) year'))->distinct()->orderBy('tanggal', 'ASC')->get();
        foreach ($tahunan as $hasil){
            for($j = $hasil->year; $j < $hasil->year+1; $j++) {
                $data_transaksi_tahunan[$j] =  DB::table('transaksi')->whereYear('tanggal', $j)->sum('nominal');
            }
        }
        return view ('admin.index', compact('hari_ini','bulan_ini','tahun_ini','semua_transaksi', 'hari', 'bulan', 'tahun', 'tahunan', 'total_transaksi','total_reseller','total_barang', 'total_agen','chart_transaksi','data_transaksi_tahunan'));
    }
}
