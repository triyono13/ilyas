<script type="text/javascript">
		$(document).on('change','.Eproductname',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("Eharga");
					console.log(data.harga);
					$('#Eharga').val(data.harga);

				},
				error:function(){

				}
			});
		});


</script>
<script type="text/javascript">
function getcut(jumlah){
 var rate = $("#Eharga").val();
 var hasil = eval(jumlah) * rate;
 $('#Etotal').val(hasil);
} 

</script>
<script>
    $(document).ready(function() {
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        $("#tanggal_edit").datepicker({
            format: 'dd-MM-yyyy',
            container: container,
            autoclose: true,
            daysOfWee: "0,6",
            endDate: "+infinity"
        });
    });
</script>
<form class="form-horizontal" role="form" method="POST" action="{{route('transaksi.update', $transaksi->id)}}">
@csrf
@method('put')
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Tanggal</label></center>
            <input type="text" class="form-control" name="tanggal" placeholder="dd/mm/yyyy" data-provide="datepicker" id="tanggal_edit" data-date-autoclose="true" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" value="{{ date('d-F-Y', strtotime($transaksi->tanggal)) }}" oninput="setCustomValidity('')" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Reseller</label></center>
            <select class="form-control select2" name="reseller" data-toggle="select2">
                <option value="">-- Pilih Reseller --</option>
                @foreach ($reseller as $result)
                <option value="{{$result->id}}"
                @if ($transaksi->reseller_id == $result->id)
                    selected
                @endif
                >{{$result->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Nama Item</label></center>
            <select class="form-control select2 Eproductname" id="prod_cat_id" name="item" data-toggle="select2">
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
    <input type="hidden" class="form-control" id="Eharga" name="harga">
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Total Harga</label></center>
            <input type="number" min="0" class="form-control" id="Etotal" name="total" placeholder="0" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>            
        <button type="submit" class="btn btn-primary waves-effect" name="ubah">Ubah</button>
    </form>
</div> 