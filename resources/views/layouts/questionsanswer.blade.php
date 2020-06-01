<div class="main-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-block">
                <h3>Siswa yang udeh Mengerjakan</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Pilihan Ganda</th>
                                <th>Essay</th>
                                <th>Aksi</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $num = 1;
                            @endphp
                            @foreach($answerer as $a)
                            <tr>
                                <th scope="row">{{$num}}</th>
                                <td>{{$a->name}}</td>
                                @php
                                $url = route('viewquestion', ['id' =>$questionid,'ischeck' => true,'uid'=> $a->answeruserid]);
                                @endphp
                                <td>@if(is_null($a->correct_multiplechoice)) Belum Diperiksa @else {{$a->correct_multiplechoice}} @endif</td>
                                <td>@if(is_null($a->correct_essay)) Belum Diperiksa @else {{$a->correct_essay}} @endif</td>
                                <td><a href="{{$url}}" type="button" role="button" class="btn btn-outline-primary btn-sm">Periksa Jawaban</a></td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control w-25" placeholder="90" value="{{$a->score}}" aria-label="Nilai Jawaban" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button">Simpan</button>
                                        </div>
                                    </div>


                                </td>

                            </tr>
                            @php
                            $num++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>