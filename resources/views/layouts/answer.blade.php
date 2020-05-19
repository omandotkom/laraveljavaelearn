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

        @if($u->multiplechoice)
        {!! $u->question_text !!}
        <form action="{{route('saveanswer')}}" method="post">
            @csrf
            <div class="ml-2 row">

            </div>
            <div class="ml-2 row form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="asnwera" value="a" @if(!is_null($answer) && $answer->answer === "a") checked @endif >
                    <label class="form-check-label" for="asnwera">
                        {{$u->a}}
                    </label>
                </div>
            </div>
            <div class="ml-2 row form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="asnwerb" value="b" @if(!is_null($answer) && $answer->answer === "b") checked @endif >
                    <label class="form-check-label" for="answerb">
                        {{$u->b}}
                    </label>
                </div>
            </div>
            <div class="ml-2 row form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="asnwerc" value="c" @if(!is_null($answer) && $answer->answer === "c") checked @endif >
                    <label class="form-check-label" for="answerc">
                        {{$u->c}}
                    </label>
                </div>
            </div>
            <div class="ml-2 row form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answerd" value="d" @if(!is_null($answer) && $answer->answer === "d") checked @endif >
                    <label class="form-check-label" for="answerd">
                        {{$u->d}}
                    </label>
                </div>
            </div>
            <input type="hidden" name="answertype" value="{{$u->multiplechoice}}">
            <input type="hidden" name="idquestion" value="{{$u->id}}" />
            @if(!is_null($answer) && !$answer->editable)
            
            @else
            <div class="row float-right">
                <button type="submit" class="btn btn-info float-right"><i class="ik ik-save"></i>Simpan</button>
            </div>

            @endif
            
        </form>


        @else

        <script src="{{url('/ace-builds/src-noconflict/ace.js')}}" type="text/javascript" charset="utf-8">
        </script>
        <script src="{{url('/ace-builds/src-noconflict/ext-language_tools.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{url('/ace-builds/src-noconflict/theme-chrome.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{url('/ace-builds/src-noconflict/mode-java.js')}}" type="text/javascript" charset="utf-8"></script>
        <style type="text/css" media="screen">
            #editor {
                height: 300px;
            }

            #output {
                height: 300px;
            }
        </style>

        {!! $u->question_text !!}
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editor</h3>
                </div>

                <div class="panel-body">
                    <div id="editor" class="rounded">@if(isset($answer) && !is_null($answer)) {{$answer->answer}} @else @include('layouts.defaultcode') @endif</div>
                </div>

            </div>
        </div>

        <div class="card w-50 mx-auto rounded mt-3">
            <div class="card-body">
                <form action="{{route('saveanswer')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-group mb-3">
                            <input type="text" name="filename" class="form-control" id="inputfilename" placeholder="Main" value="Main" aria-label="File Name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">.java</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-group mx-auto" role="group" aria-label="Action">
                            <button type="button" id="inputbutton" onclick="compile();" class="btn btn-outline-primary "><i class="ik ik-play"></i>Jalankan</button>
                            <button type="submit" class="btn btn-info"><i class="ik ik-save"></i>Simpan</button>
                            <input type="hidden" id="editorghost" name="editorghost" />
                            <input type="hidden" name="answertype" value="{{$u->multiplechoice}}">
                            <input type="hidden" name="idquestion" value="{{$u->id}}" />
                        </div>
                    </div>
                    <div class="row" id="loading" hidden>
                        <div class="spinner mx-auto mt-1 mb-0">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Output</h3>
                </div>
                <div class="panel-body">
                    <div id="output" class="rounded"></div>
                </div>
            </div>
        </div>


        <script>
            ace.require('ace/ext-language_tools');
            var editor = ace.edit("editor");
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/java");
            editor.setOptions({
                enableBasicAutocompletion: true,
                enableSnippets: true,
                enableLiveAutocompletion: false
            });
            editor.getSession().on("change", function() {
                $("#editorghost").val(editor.getSession().getValue());
            });

            var output = ace.edit("output");
            output.setTheme("ace/theme/eclipse");
            output.session.setMode("ace/mode/text");
            output.setReadOnly(true);
            output.setOptions({
                hScrollBarAlwaysVisible: true,
                vScrollBarAlwaysVisible: true,

            });

            function compile() {
                $('#inputfilename').prop('disabled', true);
                $('#inputbutton').prop('disabled', true);
                $("#loading").prop("hidden", false);
                var url = "{{route('compileandrun')}}";
                const options = {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                };
                axios.post(url, {
                        code: editor.getValue(),
                        id: "{{Auth::user()->id}}",
                        filename: $('#inputfilename').val(),
                    }, options)
                    .then(function(response) {
                        // handle success
                        //console.log(response.data.discount);
                        output.setValue(response.data);
                    })
                    .catch(function(error) {
                        // handle error
                        output.setValue(error);
                    })
                    .then(function() {
                        // always executed

                        $('#inputfilename').prop('disabled', false);
                        $('#inputbutton').prop('disabled', false);
                        $("#loading").prop("hidden", true);

                    });
            }
        </script>

        @endif

        @csrf

        <div class="row mt-5">
            <label class="mx-auto">{{ $q->onEachSide(20)->links() }}</label>
        </div>

        @endforeach

    </div>
</div>