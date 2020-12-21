<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable =  ['reseller_id','gudang_id','tanggal','jumlah_items','nominal'];

    public function reseller()
    {
        return $this->belongsTo('App\Reseller');
    }

    public function gudang()
    {
        return $this->belongsTo('App\Gudang');
    }
}
