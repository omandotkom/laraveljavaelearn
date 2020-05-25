<!-- Modal -->
<div class="modal fade" id="confirmpengumpulan" tabindex="-1" role="dialog" aria-labelledby="confirmtitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="post" action="{{route('collectanswer')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmtitle">Kumpulkan Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Dengan mengumpulkan jawaban, maka :
                    <ul>
                        <li>Peserta tidak bisa mengubah jawaban.</li>
                        <li>Peserta dinyatakan sudah selesai mengerjakan quiz / soal ini.</li>
                    </ul>
                    <input type="hidden" name="questionid" value="{{$question->id}}"/>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info">Kumpulkan jawaban</button>
                </div>
            </form>

        </div>
    </div>
</div>