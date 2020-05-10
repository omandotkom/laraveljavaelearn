<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <form class="forms-sample">
                    
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Soal Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Dibuat Oleh</label>
                        <input  required type="text" class="form-control" readonly id="exampleInputUsername1" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Soal</label>
                        <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Soal Pemrograman Java 1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Soal</label>
                        <input required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save changes</button>
            </div>
            </form>

        </div>
    </div>
</div>