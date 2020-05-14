<div class="main-content">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>
    <style>
        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }
    </style>

    <div class="container-fluid">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mx-auto">Informasi Soal <button type="button" data-toggle="collapse" data-target="#infocollapse" aria-expanded="false" aria-controls="infocollapse" class="btn btn-light"><i class="ik ik-chevron-down"></i></button>
                    </h3>
                </div>
                <div id="infocollapse" class="card-body collapse">
                    <div class="form-group row">
                        <label for="soalid" class="col-sm-3 col-form-label"><i class="ik ik-book-open"></i> Kode Soal</label>
                        <div class="col-sm-9">
                            <input type="text" name="soalid" class="form-control" readonly value="{{$question->id}}" id="soalid">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasoal" class="col-sm-3 col-form-label"><i class="ik ik-book-open"></i> Nama Soal</label>
                        <div class="col-sm-9">
                            <input type="text" name="namasoal" class="form-control" readonly value="{{$question->name}} ({{$question->child->count()}} Pertanyaan)" id="namasoal">
                        </div>
                    </div>


                </div>
            </div>
        </div>
        @foreach($q as $u)

        <div class="card">
            <div class="card-header">
                <h3>Pertanyaan</h3>
            </div>
            <div class="card-body">
                <form action="{{route('saveanswer')}}" method="post">
                    @csrf
                    <div class="ml-2 row">
                        {!! $u->question_text !!}
                    </div>
                    <div class="ml-2 row form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="asnwera" value="a">
                            <label class="form-check-label" for="asnwera">
                                {{$u->a}}
                            </label>
                        </div>
                    </div>
                    <div class="ml-2 row form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="asnwerb" value="b">
                            <label class="form-check-label" for="answerb">
                                {{$u->b}}
                            </label>
                        </div>
                    </div>
                    <div class="ml-2 row form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="asnwerc" value="c">
                            <label class="form-check-label" for="answerc">
                                {{$u->c}}
                            </label>
                        </div>
                    </div>
                    <div class="ml-2 row form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="answerd" value="d">
                            <label class="form-check-label" for="answerd">
                                {{$u->d}}
                            </label>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info float-right"><i class="ik ik-share"></i>Simpan</button>
            </div>
        </div>
        <form>
            <label class="float-right">{{ $q->onEachSide(5)->links() }}</label>

            @endforeach

    </div>
</div>