<div class="main-content">
    <link rel="stylesheet" href="{{url('dashboardasset/src/loading.css')}}">

    <div class="container-fluid">

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
        </head>

            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editor</h3>
                    </div>
                    <div class="panel-body">
                        <div id="editor" class="rounded">@include('layouts.defaultcode2')</div>
                    </div>
                </div>
                <div class="text-center">---End of editor---</div>
            </div>

            <div class="card w-50 mx-auto  rounded">
                <div class="card-body">
                    <div class="row">
                        <form class="form-inline mx-auto">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="inputfilename" placeholder="Hello.java"> .java
                            </div>
                            <button type="button" id="inputbutton" onclick="compile();" class="btn btn-outline-primary "><i class="ik ik-play"></i> Compile & Run</button>
                        </form>
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

                var output = ace.edit("output");
                output.setTheme("ace/theme/monokai");
                output.session.setMode("ace/mode/java");
                output.setReadOnly(true);

                function compile() {
                    $('#inputfilename').prop('disabled', true);
                    $('#inputbutton').prop('disabled', true);
                    $("#loading").prop("hidden",false);
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
                            $("#loading").prop("hidden",true);
                  
                        });
                }
            </script>

    </div>
</div>