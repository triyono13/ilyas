@extends('layouts.master')

@section('title') Data Resellers @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    @component('common-components.breadcrumb')
         @slot('title') Admin   @endslot
         @slot('title_li') Resellers  @endslot
     @endcomponent
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('reseller.create')}}" class="btn btn-success waves-effect waves-light" role="button" aria-pressed="true">Tambah Reseller</a><hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="width:1%; text-align: center;">No.</th>
                                <th style="width:5%; text-align: center;">Nama</th>
                                <th style="width:3%; text-align: center;">Total <br>Transaksi</th>
                                <th style="width:5%; text-align: center;">Tempat/TGL Lahir</th>
                                <th style="width:10%; text-align: center;">Alamat Lengkap</th>
                                <th style="width:5%; text-align: center;">No.Telp</th>
                                <th style="width:5%; text-align: center;">Nama Agen</th>
                                <th style="width:5%; text-align: center;">Wilayah</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            @foreach ($reseller as $result => $hasil)
                                <td>{{$result + $reseller -> firstitem()}}</td>
                                <td>{{$hasil->nama}}</td>
                                <td>11</td>
                                <td>{{$hasil->tempat_lahir}} <br> {{$hasil->tgl_lahir}}</td>
                                <td><textarea name="" id="" cols="38" rows="2" disabled>{{$hasil->alamat}}&#13;&#10;Provinsi : {{$hasil->provinsi}} &#13;&#10;Kota/Kab : {{$hasil->kota}} &#13;&#10;Kelurahan : {{$hasil->kelurahan}}</textarea></td>
                                <td>{{$hasil->telp }}</td>
                                <td>{{$hasil->nama_agen}}</td>
                                <td>{{$hasil->wilayah}}</td>
                                <td>
                                    <form action="{{route('reseller.destroy', $hasil->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('reseller.show', $hasil->id)}}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Detail Reseller" class="btn btn-primary btn-flat btn-sm">
                                        <span class="dripicons dripicons-document"></span> Detail</a>
                                        <button type="submit" class="btn btn-danger btn-sm btn-flat" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Hapus Transaksi" onclick="return confirm('Yakin ingin menghapus data Transaksi ?')"><span class="dripicons dripicons-trash"> Hapus</span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    
@include('sweetalert::alert')
@endsection

@section('script')
<script type="text/javascript" src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> 
@endsection