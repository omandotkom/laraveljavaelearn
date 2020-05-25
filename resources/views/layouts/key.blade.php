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
            @if ($message = Session::get('error'))
            <div class="alert bg-warning text-white alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ik ik-x"></i>
                </button>
            </div>
            
            @endif
            <div class="card">
                <form action="{{route('soalkeyprocess')}}" method="post">
                    @csrf
                    <div class="card-header">
                        <h3 class="mx-auto"><i class="ik ik-lock"></i> Informasi Soal
                        </h3>
                    </div>
                    <div id="infocollapse" class="card-body">
                        <div class="form-group row">
                            <label for="soalid" class="col-sm-3 col-form-label"><i class="ik ik-book-open"></i> Kode Soal</label>
                            <div class="col-sm-9">
                                <input type="text" name="soalid" class="form-control" readonly value="{{$question->id}}" id="soalid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="soalcreator" class="col-sm-3 col-form-label"><i class="ik ik-user"></i> Dibuat Oleh</label>
                            <div class="col-sm-9">
                                <input type="text" name="soalcreator" class="form-control" readonly value="{{$question->user->name}}" id="soalcreator">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namasoal" class="col-sm-3 col-form-label"><i class="ik ik-book-open"></i> Nama Soal</label>
                            <div class="col-sm-9">
                                <input type="text" name="namasoal" class="form-control" readonly value="{{$question->name}} ({{$question->child->count()}} Pertanyaan)" id="namasoal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="key" class="col-sm-3 col-form-label"><i class="ik ik-lock"></i> Masukkan Key</label>
                            <div class="col-sm-9">
                                <input type="text" required name="key" class="form-control" id="key">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary btn-sm btn-rounded float-right mb-3"><i class="ik ik-log-in mb-3"></i> Masuk</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>