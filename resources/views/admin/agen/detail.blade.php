@extends('layouts.master')

@section('title') Form Elements @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')

     @component('common-components.breadcrumb')
         @slot('title') Agen  @endslot
         @slot('li_1') Edit Agen  @endslot
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
                <h4 class="card-title">Detail Data Agen</h4><hr>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{$agen->nama}}" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" Disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{$agen->tempat_lahir}}" Disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{$agen->tgl_lahir}}" name="tanggal" Disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-10">
                        <textarea name="alamat" id="" cols="100" rows="3" placeholder="Alamat Lengkap" disabled>{{$agen->alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-md-2 col-form-label">Provinsi</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->provinsi}}" name="provinsi" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Provinsi Asal" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Kota</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->kota}}" name="kota" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kota Asal" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-number-input" class="col-md-2 col-form-label">Kecamatan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->kecamatan}}" name="kecamatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kecamatan" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Kelurahan</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->kelurahan}}" name="kelurahan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kelurahan" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Kode Pos</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->kode_pos}}" name="kode_pos" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kode Pos" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Telp</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->telp}}" name="telp" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="No. Telpon" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">FB</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->fb}}" name="fb" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Facebook" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">IG</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->ig}}" name="ig" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Instagram" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Shopee</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->shopee}}" name="shopee" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Shopee" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-md-2 col-form-label">Wilayah</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="{{$agen->wilayah}}" name="wilayah" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Wilayah Agen" readonly>
                    </div>
                </div><hr>
                <a style="padding:0.47rem 3.75rem;" class="btn btn-warning waves-effect waves-light" href="{{route('agen.edit', $agen->id)}}">Edit Data</a>

                <a style="padding:0.47rem 3.75rem;" class="btn btn-danger waves-effect waves-light" href="{{route('agen.index')}}">Kembali</a>
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