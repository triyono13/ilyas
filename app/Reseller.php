<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $table = 'reseller';
    protected $fillable = ['nama','tempat_lahir','tgl_lahir','alamat','kelurahan','kecamatan','kota','provinsi','kode_pos','telp','fb','ig','shopee','nama_agen','wilayah'];
}
