<div class="modal fade" id="modal-produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" class="produk" enctype="multipart/form-data">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        @method("POST")
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input class="form-control" type="text" name="nama_produk" id="nama_produk">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input class="form-control" type="number" name="harga" id="harga">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="jumlah">Jumlah Produk</label>
                                <input class="form-control" type="number" name="jumlah" id="jumlah">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="keterangan">Keterangan Produk</label>
                                <textarea name="keterangan" class=" form-control" id="keterangan" cols="30" rows="5"
                                    placeholder="Keterangan Produk" style="resize: none"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
