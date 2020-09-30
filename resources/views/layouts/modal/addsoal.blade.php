<!-- Modal -->
<div class="modal fade" id="addsoal" tabindex="-1" role="dialog" aria-labelledby="addsoaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('addquestion')}}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsoaltitle">Buat Soal Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Dibuat Oleh</label>
                        <input required type="text" class="form-control" readonly id="exampleInputUsername1" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="classid" required class="custom-select">
                        @if(isset($classes) && $classes != null)
                        @foreach($classes as $c)
                        
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        
                        @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Soal</label>
                        <input required type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Soal Pemrograman Java 1">
                    </div>
                   
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Soal</label>
                        <input required type="text" name="key" value="NO_PSWD" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <small>gunakan NO_PSWD untuk tidak memberikan password.</small>
                    </div>
                    <div class="form-group">
                        <label for="dropper-default">Dapat dikerjakan mulai</label>
                        <input class="form-control" required name="start" type="date" placeholder="Select your date" >
                    </div>
                    <div class="form-group">
                        <label for="dropper-default">Tidak dapat dikerjakan pada</label>
                        <input class="form-control" name="end"  required type="date" placeholder="Select your date" >
                    </div>
                    <div class="form-group">
                        <label for="minute_duration">Durasi Pengerjaan (Menit)</label>
                        <input aria-describedby="minute_duration_help" type="numeric" name="minute_duration" class="form-control" id="minute_duration" placeholder="60">
                        <small id="minute_duration_help">Dalam menit.</small>
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