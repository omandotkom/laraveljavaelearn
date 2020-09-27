<!-- Modal -->
<div class="modal fade" id="addmaterials" tabindex="-1" role="dialog" aria-labelledby="addmaterialstitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('storematerial')}}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmaterialstitle">Tambah Materi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label for="class">Kelas</label>
                        <select name="classid" required class="custom-select">
                        @if(isset($classes) && $classes != null)
                        @foreach($classes as $i)
                        
                            <option value="{{$i->id}}">{{$i->name}}</option>
                        
                        @endforeach
                        @endif
                        </select>
                    </div>
                        
                <div class="form-group">
                        <label for="name">Judul Materi</label>
                        <input required type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="dokumen">Dokumen</label>
                        <input required type="file" name="dokumen" class="form-control" id="dokumen" >
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