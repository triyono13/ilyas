<form class="form-horizontal" role="form" method="POST" action="{{route('gudangagen.update', $gudang->id)}}">
@csrf
@method('put')
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Nama</label></center>
            <input type="text" name="name" class="form-control" value="{{$gudang->nama_item}}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Stock Item</label></center>
            <input type="text" name="stock" class="form-control" value="{{$gudang->stock}}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <center><label>Harga</label></center>
            <input type="text" name="harga" class="form-control" value="{{$gudang->harga}}" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>            
        <button type="submit" class="btn btn-primary waves-effect" name="ubah">Ubah</button>
    </form>
</div> 