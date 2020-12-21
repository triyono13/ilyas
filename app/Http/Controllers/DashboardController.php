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
        $hari_ini = "0";
        $bulan_ini = "0";
        $tahun_ini = "0";
        $semua_pemasukkan = "0";
        $pengeluaran_hari_ini = "0";
        $pengeluaran_bulan_ini ="0";
        $pengeluaran_tahun_ini ="0";
        $semua_pengeluaran = "0";
        $tahunan = "0";
        return view ('admin.index', compact('hari_ini','bulan_ini','tahun_ini','semua_pemasukkan','pengeluaran_hari_ini','pengeluaran_bulan_ini','pengeluaran_tahun_ini','semua_pengeluaran', 'hari', 'bulan', 'tahun', 'tahunan'));
    }
}
