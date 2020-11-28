@php
if (Auth::user()->role == "admin") {
$title = "Review Progress";
$teks = "Lihat Review Progress";
} elseif (Auth::user()->role == "student") {
$title = "Soal";
$teks = "Lihat Soal";}
@endphp
<div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">@if(isset($num)) <b style="font-size:25px;">@php echo $num; @endphp</b> @endif {{$title}} </h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>

                        <div class="d-flex align-items-center flex-row mt-30">
                            <div class="btn-group mx-auto" role="group" aria-label="Basic example">
                                {{--<a type="button" data-toggle="modal" data-target="#getsoal" class="btn btn-info mr-1 btn-sm text-white" role="button"> <i class="ik ik-plus"></i> Kode Soal</a> --}}
                                <a type="button" href="{{route('viewallquestions')}}" class="btn btn-outline-info ml-1 btn-sm" role="button"> <i class="ik ik-book"></i> {{$teks}} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
