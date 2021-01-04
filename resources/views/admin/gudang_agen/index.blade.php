@extends('layouts.master')

@section('title') Data Gudang Agen @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    @component('common-components.breadcrumb')
         @slot('title') Admin   @endslot
         @slot('title_li') Gudang Agen @endslot
     @endcomponent
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal">Tambah Item</button><hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Stock</th>
                                <th style="text-align: center;">Harga</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            @foreach ($gudang as $result => $hasil)
                                <td style="text-align: center;">{{$result + $gudang -> firstitem()}}</td>
                                <td style="text-align: center;">{{$hasil->nama_item}}</td>
                                <td style="text-align: center;">{{$hasil->stock}}</td>
                                <td style="text-align: center;">Rp. {{ number_format($hasil -> harga,0,',','.')}},-</td>
                                <td style="text-align: center;">
                                    <form action="{{route('gudang.destroy', $hasil->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="#" onclick="edit_kategori('{{route('gudangagen.edit', $hasil->id)}}')" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit Transaksi" class="btn btn-primary btn-flat btn-sm">
                                        <span class="dripicons dripicons-document"></span> Edit Item</a>
                                        <button type="submit" class="btn btn-danger btn-sm btn-flat" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Hapus Transaksi" onclick="return confirm('Yakin ingin menghapus data Transaksi ?')"><span class="dripicons dripicons-trash"> Hapus Item</span></button>
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
    <!-- Modal Tambah Items -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel"> Tambah Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{route('gudangagen.store')}}">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Nama Item</label></center>
                            <input type="text" class="form-control" name="name" placeholder="Nama Item" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Stock Item</label></center>
                            <input type="number" min="0" class="form-control" name="stock" placeholder="Stock Item" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Harga</label></center>
                            <input type="number" min="0" class="form-control" name="harga" placeholder="Harga Item" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End Modal Tambah Items -->

    <div id="mKtgEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Item Agen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert')
@endsection

@section('script')
<script type="text/javascript">
    function edit_kategori(file) {
        var myfile = file;
        $('#mKtgEdit').modal('show');
        $('#mKtgEdit .modal-body').load(myfile);
    }
</script>

<script type="text/javascript" src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script> 
@endsection