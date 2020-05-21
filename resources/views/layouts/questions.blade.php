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
            $("#".concat(status)).prop('disabled',true);
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
                    $("#".concat(status)).prop('disabled',false);
                });
        }
    </script>
    <div class="container-fluid">
        <div class="row layout-wrap" id="layout-wrap">

            @foreach($questions as $q)
            <div class="col-12 list-item">
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero card-content">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="{{route('viewquestion',$q->id)}}">
                                <i class="ik ik-book-open"></i> <strong>#{{$q->id}}</strong> {{$q->name}}
                            </a>
                            @if($q->key == "NO_PSWD")
                            <i class="ik ik-unlock"></i>
                            @else
                                <i class="ik ik-lock"></i> @if(Auth::user()->role == "admin") {{$q->key}} @endif
                            @endif
                            <p class="mb-1 text-muted text-small category w-15 w-xs-100"><i class="ik ik-user"></i> {{$q->owner->name}}</p>
                            <p class="mb-1 text-muted text-small date w-15 w-xs-100">{{$q->created_at}}</p>
                            @if(Auth::user()->role === "admin")
                            <div class="w-xs-100">
                                <input type="checkbox" id="status{{$q->id}}" onchange="ubahstatus('{{$q->id}}','status{{$q->id}}');" class="rounded" data-style="slow" data-on="<i class='ik ik-check'></i>Terbuka" data-off="<i class='ik ik-x'></i>Ditutup" data-onstyle="success" data-offstyle="secondary" data-toggle="toggle" @if($q->status =="open") checked @endif>
                            </div>
                            <div class="w-xs-100">
                            <a class="btn btn-outline-primary" href="{{route('viewanswerer',$q->id)}}" role="button">Lihat</a>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>