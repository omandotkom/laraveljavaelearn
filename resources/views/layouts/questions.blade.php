<div class="main-content">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>
    <style>
        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }
    </style>
    <script>
        function ubahstatus(id, status) {
            var checked = $("#".concat(status)).prop("checked");
            var url = "{{route('updatequestionstatus')}}";
            const options = {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            $("#".concat(status)).prop('disabled', true);
            axios.post(url, {
                    id: id,
                    status: checked,
                }, options)
                .then(function(response) {
                    // handle success
                    console.log(response);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                    $("#".concat(status)).prop('disabled', false);
                });
        }
    </script>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-block">
                <h3>Seluruh Quiz</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Soal</th>
                                <th>Pembuat</th>
                                <th>Tanggal Akses</th>
                                <th>Durasi Pengerjaan</th>
                                @if(Auth::user()->role === "admin")
                                <th>Aksi</th>
                                <th>Akses</th>
                                @endif
                                <th>Dibuat Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $q)
                            <tr>
                                <th scope="row">{{$q->id}}</th>
                                <td><a href="{{route('viewquestion',$q->id)}}" class="badge badge-primary">{{$q->name}}</a></td>
                                <td>{{$q->owner->name}}</td>
                                <td>{{$q->start}} sampai {{$q->end}}</td>
                                <td>{{$q->duration_minute}} Menit</td>
                                @if(Auth::user()->role === "admin")<td><a class="btn btn-outline-info" href="{{route('viewanswerer',$q->id)}}" role="button">Lihat</a></td>
                                <td> <input type="checkbox" id="status{{$q->id}}" onchange="ubahstatus('{{$q->id}}','status{{$q->id}}');" class="rounded" data-style="slow" data-on="<i class='ik ik-check'></i>Terbuka" data-off="<i class='ik ik-x'></i>Ditutup" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" @if($q->status =="open") checked @endif  > </td> @endif
                                <td>{{$q->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
</div>