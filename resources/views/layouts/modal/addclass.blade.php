<!-- Modal -->
<div class="modal fade" id="addclass" tabindex="-1" role="dialog" aria-labelledby="addclasstitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('storeclass')}}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addclasstitle">Buat Kelas Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Kelas</label>
                        <input required type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="instruktur">Instruktur</label>
                        <select name="instructor" required class="custom-select">
                        @if(isset($instructors) && $instructors != null)
                        @foreach($instructors as $i)
                        
                            <option value="{{$i->id}}">{{$i->name}}</option>
                        
                        @endforeach
                        @endif
                        </select>
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