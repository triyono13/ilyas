@extends('layouts.master')

@section('title') Data Transaksi @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    @component('common-components.breadcrumb')
         @slot('title') Admin   @endslot
         @slot('title_li') Transaksi  @endslot
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
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal">Tambah Item</button><hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="width:1%; text-align: center;">No.</th>
                                <th style="width:5%; text-align: center;">Nama Agen</th>
                                <th style="width:5; text-align: center;">Nama Item</th>
                                <th style="width:5%; text-align: center;">Tanggal <br> Pembelian</th>
                                <th style="width:5%; text-align: center;">Harga Barang</th>
                                <th style="width:10%; text-align: center;">Jumlah Barang</th>
                                <th style="width:10%; text-align: center;">Total Harga</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            @foreach ($transaksi as $result => $hasil)
                                <td>{{$result + $transaksi -> firstitem()}}</td>
                                <td>{{$hasil ->agen->nama}}</td>
                                <td>{{$hasil ->gudang->nama_item}}</td>
                                <td>{{$hasil->tanggal}}</td>
                                <td>Rp. {{ number_format($hasil ->gudang->harga,0,',','.')}},-</td>
                                <td>{{$hasil->jumlah_items }}</td>
                                <td>Rp. {{ number_format($hasil -> nominal,0,',','.')}},-</td>
                                <td style="text-align: center;">
                                    <form action="{{route('transaksiagen.destroy', $hasil->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="#" onclick="edit_kategori('{{route('transaksiagen.edit', $hasil->id)}}')" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit Transaksi" class="btn btn-primary btn-flat btn-sm">
                                        <span class="dripicons dripicons-document"></span> Edit</a>
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
                    <form class="form-horizontal" method="POST" action="{{route('transaksiagen.store')}}">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Tanggal</label></center>
                            <input type="text" class="form-control" name="tanggal" placeholder="dd/mm/yyyy" data-provide="datepicker" id="tanggal_tambah" data-date-autoclose="true" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Nama Agen</label></center>
                            <select class="form-control select2" name="agen" data-toggle="select2">
                                <option value="">-- Pilih Agen --</option>
                                @foreach ($agen as $result)
                                <option value="{{$result->id}}">{{$result->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Nama Item</label></center>
                            <select class="form-control select2 productname" id="prod_cat_id" name="item" data-toggle="select2">
                                <option value="">-- Pilih Item --</option>
                                @foreach ($gudang as $result)
                                <option value="{{$result->id}}">{{$result->nama_item}} - Rp. {{ number_format($result -> harga,0,',','.')}},-</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Jumlah Item</label></center>
                            <input type="number" min="0" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Item" onkeyup="getcut(this.value).value;" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                        <input type="hidden" class="form-control" id="harga" name="harga">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <center><label>Total Harga</label></center>
                            <input type="number" min="0" class="form-control" id="total" name="total" placeholder="0" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Data</button>
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
                    <h4 class="modal-title" id="myModalLabel">Edit Data Transaksi</h4>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).on('change','.productname',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findHarga')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("harga");
					console.log(data.harga);
					$('#harga').val(data.harga);

				},
				error:function(){

				}
			});
		});


</script>
<script type="text/javascript">
function getcut(jumlah){
 var rate = $("#harga").val();
 var hasil = eval(jumlah) * rate;
 $('#total').val(hasil);
} 

</script>

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
<script type="text/javascript" src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function() {
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        $("#tanggal_tambah").datepicker({
            format: 'dd-MM-yyyy',
            container: container,
            autoclose: true,
            daysOfWee: "0,6",
            endDate: "+infinity"
        });
    });
</script>

@endsection