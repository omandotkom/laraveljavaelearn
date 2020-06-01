<script>
    function fetchscoredata() {
        $('#exampleModalCenter').modal('show');
        $("#scoreloadstatus").text("Sedang mengambil data...");
        $("#submitnilai").prop("disabled", true);
        var scoresummaryurl = "{{route('checkanswer',['question_id' =>$qid , 'user_id'=> $uid])}}";
        axios.get(scoresummaryurl)
            .then(function(response) {
                // handle success
                console.log(response);
                $("#mc").val(response.data.mc);
                $("#es").val(response.data.es);
                $("#mctitle").text("Pilihan Ganda Benar dari ".concat(response.data.totalmc).concat(" soal"));
                $("#estitle").text("Essay Benar dari ".concat(response.data.totales).concat(" soal"));
                $("#nama").val(response.data.user.name);
                $("#question_id").val(response.data.question_id);
                $("#user_id").val(response.data.user.id);
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                $("#scoreloadstatus").text("");
                $("#submitnilai").prop("disabled", false);
            });
    }
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('savescore')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">Hasil Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <label id="scoreloadstatus"></label>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Peserta</label>
                            <input type="text" readonly class="form-control" name="nama" readonly id="nama" placeholder="Nama Peserta">
                        </div>
                        <div class="form-group">
                            <label id="mctitle" for="pg">Pilihan Ganda</label>
                            <input type="text" readonly class="form-control" name="mc" readonly id="mc" placeholder="0">
                        </div>
                        <div class="form-group">
                            <label id="estitle" for="es">Essay</label>
                            <input type="text" readonly class="form-control" readonly id="es" name="es" placeholder="0">
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Total Nilai">
                        </div>
                        <input type="hidden" id="question_id" name="question_id">
                        <input type="hidden" id="user_id" name="user_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('viewscores')}}"  role="button" class="btn btn-secondary" >Nilai Nanti</a>
                    <button type="submit" id="submitnilai" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>