<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'gudang';
    protected $fillable = ['nama_item','stock','harga'];

    public function gudang()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
