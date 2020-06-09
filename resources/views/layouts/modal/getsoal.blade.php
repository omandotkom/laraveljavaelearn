<!-- Modal -->
<div class="modal fade" id="getsoal" tabindex="-1" role="dialog" aria-labelledby="getsoaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getsoaltitle">Masukkan Kode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Soal</label>
                    <input required type="text" name="name" class="form-control" id="soalid" placeholder="1">
                </div>
                @csrf
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="lanjutkanbtn" class="btn btn-info">Lanjutkan</button>
            </div>
            <script>
                $(document).ready(function() {
                    $("#lanjutkanbtn").click(function(){
                        var soalid = $("#soalid").val();
                        window.location = "{{route('viewquestion')}}".concat("/").concat(soalid);
                    });
                });
            </script>

        </div>
    </div>
</div>