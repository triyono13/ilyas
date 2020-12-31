<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'agen';
    protected $fillable = ['nama','tempat_lahir','tgl_lahir','alamat','kelurahan','kecamatan','kota','provinsi','kode_pos','telp','fb','ig','shopee','wilayah'];
}
