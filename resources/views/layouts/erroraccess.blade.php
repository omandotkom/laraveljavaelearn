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
            <div class="alert bg-warning text-white alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ik ik-x"></i>
                </button>
            </div>
            <div class="row">
                <a href="{{$link}}" class="badge mx-auto badge-info"><i class="ik ik-arrow-left"></i>Kembali</a>
            </div>
            @if(isset($q))
            <div class="row">
                <label class="mx-auto mt-5">{{ $q->onEachSide(20)->links() }}</label>
            </div>
            @if(Auth::user()->role == "admin")
                    @if($checkmode && !$q->hasMorePages())
                    <div class="row d-flex align-items-end flex-column">
                    @include('layouts.modal.scoresummary')
                    <button type="button" onclick="fetchscoredata();" class="btn btn-secondary mx-auto"><i class="ik ik-clipboard"></i> Beri Nilai</button>
                    </div>
                    @endif
            @else
                @if(!$q->hasMorePages())
              
            <div class="row d-flex align-items-end flex-column">
            @if(!isset($collected))
                @include('layouts.modal.confirmcollection')
                <button type="button" data-target="#confirmpengumpulan" data-toggle="modal" class="btn btn-secondary mx-auto"><i class="ik ik-clipboard"></i> Kumpulkan</button>
            @endif
            </div>
            @endif
            @endif
            @endif
        </div>
    </div>
</div>