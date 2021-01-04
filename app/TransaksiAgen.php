<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiAgen extends Model
{
    protected $table = 'transaksi_agen';
    protected $fillable =  ['agen_id','gudang_id','tanggal','jumlah_items','nominal'];

    public function agen()
    {
        return $this->belongsTo('App\Agen');
    }

    public function gudang()
    {
        return $this->belongsTo('App\Gudang');
    }
}
