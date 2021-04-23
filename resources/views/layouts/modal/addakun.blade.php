<!-- Modal -->
<div class="modal fade" id="addakun" tabindex="-1" role="dialog" aria-labelledby="addakuntitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('saveinstructor')}}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addakuntitle">Buat Akun Instruktur Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label for="name">Nama Instruktur</label>
                        <input required type="text" name="name" class="form-control" id="name">
                    </div>    
                <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" name="password" class="form-control" id="password">
                    </div> 
                    @csrf
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
