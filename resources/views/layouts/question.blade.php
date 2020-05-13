<div class="main-content">

    <div class="container-fluid">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Informasi Soal</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{route('updatequestion')}}">
                        <div class="form-group row">
                            <label for="soalid" class="col-sm-3 col-form-label"><i class="ik ik-book-open"></i> Kode Soal</label>
                            <div class="col-sm-9">
                                <input type="text" name="soalid" class="form-control" readonly value="{{$question->id}}" id="soalid">
                                <small class="text-wrap">Kode ini bisa dibagikan langsung kepada orang lain yang berhak mengerjakan.</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namasoal" class="col-sm-3 col-form-label"><i class="ik ik-folder"></i> Nama Soal</label>
                            <div class="col-sm-9">
                                <input type="text" required name="name" class="form-control" value="{{$question->name}}" id="namasoal">
                            </div>
                        </div>
                        @csrf
                        <div class="form-group row">
                            <label for="kuncisoal" class="col-sm-3 col-form-label"><i class="ik ik-shield"></i> Kunci Soal</label>
                            <div class="col-sm-9">
                                <input type="text" required name="key" class="form-control" value="{{$question->key}}" id="kuncisoal">
                                <small class="text-wrap"><strong>NO_PSWD</strong> untuk tanpa kunci (semua orang bisa mengerjakan soal).</small>
                            </div>
                        </div>
                        <button type="submit" class="btn float-right btn-info  mr-2"><i class="ik ik-save"></i> Ubah</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Tambah Pertanyaan Baru</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" method="post" action="{{route('savequestion')}}">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Pertanyaan</label>
                        <input type="text" name="questiontext" class="form-control" id="exampleInputUsername1" placeholder="Jika variabel s...">
                    </div>
                    <input type="hidden" name="qid" value="{{$question->id}}">
                    <div class="form-group">
                        <label for="pilihanA">Pilihan A</label>
                        <input type="text" class="form-control" id="pilihanA" name="a" placeholder="Jawaban Opsi A">
                    </div>
                    <div class="form-group">
                        <label for="pilihanB">Pilihan B</label>
                        <input type="text" class="form-control" id="pilihanB" name="b" placeholder="Jawaban Opsi B">
                    </div>
                    <div class="form-group">
                        <label for="pilihanC">Pilihan C</label>
                        <input type="text" class="form-control" id="pilihanC" name="c" placeholder="Jawaban Opsi C">
                    </div>
                    <div class="form-group">
                        <label for="pilihanD">Pilihan D</label>
                        <input type="text" class="form-control" id="pilihanD" name="d" placeholder="Jawaban Opsi D">
                    </div>
                    <div class="form-group">
                        <label for="jawaban">Jawaban yang Tepat</label>

                        <select id="jawaban" name="answer" class="custom-select">
                            <option selected>Pilih Jawaban</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    @csrf
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-primary mr-2"><i class="ik ik-save"></i> Simpan</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header row">
                <h5>Daftar Pertanyaan</h5>
            </div>
            <div class="card-body">
                <div id="advanced_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="advanced_table" class="table dataTable no-footer mx-auto dtr-inline collapsed" role="grid" style="width: 95%;" aria-describedby="advanced_table_info">
                                <thead>
                                    <th class="nosort sorting_disabled" rowspan="1" colspan="1" aria-label="Avatar">Pertanyaan</th>
                                    <th class="sorting" tabindex="0" aria-controls="advanced_table" rowspan="1" colspan="1" style="width: 18%;" aria-label="Name: activate to sort column ascending">A</th>
                                    <th class="sorting" tabindex="0" aria-controls="advanced_table" rowspan="1" colspan="1" style="width: 18%;" aria-label="Position: activate to sort column ascending">B</th>
                                    <th class="sorting" tabindex="0" aria-controls="advanced_table" rowspan="1" colspan="1" style="width: 18%;" aria-label="Office: activate to sort column ascending">C</th>
                                    <th class="sorting" tabindex="0" aria-controls="advanced_table" rowspan="1" colspan="1" style="width: 18%;" aria-label="Age: activate to sort column ascending">D</th>
                                    <th class="sorting" tabindex="0" aria-controls="advanced_table" rowspan="1" colspan="1" style="width: 18%;" aria-label="Age: activate to sort column ascending">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($question->child as $q)
                                    <tr role="row" class="odd">

                                        <td>{{$q->question_text}}</td>
                                        <td @if($q->answer == "A") class="bg-success" @endif >{{$q->a}}</td>
                                        <td @if($q->answer == "B") class="bg-success" @endif >{{$q->b}}</td>
                                        <td @if($q->answer == "C") class="bg-success" @endif >{{$q->c}}</td>
                                        <td @if($q->answer == "D") class="bg-success" @endif >{{$q->d}}</td>
                                        <td><a type="button" role="button" href="{{route('deletequestiondetil',$q->id)}}" class="btn btn-outline-danger"><i class="ik ik-trash"></i>Hapus</a></td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>