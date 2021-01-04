<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GudangAgen extends Model
{
    protected $table = 'gudang_agen';
    protected $fillable = ['nama_item','stock','harga'];
}
