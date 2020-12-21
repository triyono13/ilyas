@extends('layouts.master')

@section('title') Form Elements @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')

     @component('common-components.breadcrumb')
         @slot('title') Reseller  @endslot
         @slot('li_1') Tambah Reseller  @endslot
     @endcomponent
<style>
    .datepicker {
    z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Isi Data Dengan Lengkap & Benar</h4><hr>
                <form class="form-horizontal" method="POST" action="{{route('reseller.store')}}">
                @csrf
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="tanggal" placeholder="dd/mm/yyyy" data-provide="datepicker" id="tanggal_tambah" data-date-autoclose="true" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-10">
                        <textarea name="alamat" id="" cols="100" rows="3" placeholder="Alamat Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-md-2 col-form-label">Provinsi</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="provinsi" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Provinsi Asal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Kota</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kota" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kota Asal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-md-2 col-form-label">Kecamatan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kecamatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kecamatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Kelurahan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kelurahan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kelurahan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Kode Pos</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_pos" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Telp</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="telp" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No. Telpon">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">FB</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="fb" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Facebook">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">IG</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="ig" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Instagram">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Shopee</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="shopee" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Shopee">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Nama Agen</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="agen" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Agen">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Wilayah</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="wilayah" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Wilayah Agen">
                    </div>
                </div><hr>
                <button style="padding:0.47rem 3.75rem;" type="submit" class="btn btn-primary waves-effect waves-light">Simpan Data</button>
                <a style="padding:0.47rem 3.75rem;" class="btn btn-danger waves-effect waves-light" href="{{route('reseller.index')}}">Kembali</a>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@section('script')
<script type="text/javascript" src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        $("#tanggal_tambah").datepicker({
            format: 'dd-MM-yyyy',
            container: container,
            autoclose: true,
            daysOfWeekDisabled: "0,6",
            endDate: "+infinity"
        });
    });
</script>
@endsection
@endsection