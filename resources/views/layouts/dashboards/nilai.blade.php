<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="card-title">@if(isset($num)) <b style="font-size:25px;">@php echo $num; @endphp</b> @endif Evaluasi Nilai</h4>
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                <img src="{{url('dashboardasset/img/exam.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                <div class="btn-group mx-auto" role="group" aria-label="Basic example">
                    <a type="button" href="{{route('viewscores')}}" class="btn btn-outline-info ml-1 btn-sm" role="button"><i class="ik ik-book"></i> Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>