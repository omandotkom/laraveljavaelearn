@if(Auth::user()->role == "student")
@include('layouts.modal.getsoal')

<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Praktik Java</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/code.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        
                        
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" href="{{route('showcode')}}" class="btn mx-auto btn-info btn-sm" role="button"> <i class="ik ik-code"></i> Code</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Soal</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        
                        <div class="d-flex align-items-center flex-row mt-30">
                            <div class="btn-group mx-auto" role="group" aria-label="Basic example">
                                <a type="button" data-toggle="modal" data-target="#getsoal" class="btn btn-info mr-1 btn-sm text-white" role="button"> <i class="ik ik-plus"></i> Kode Soal</a>
                                <a type="button" href="{{route('viewallquestions')}}" class="btn btn-info ml-1 btn-sm" role="button"> <i class="ik ik-book"></i> Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Nilai</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                        <img src="{{url('dashboardasset/img/exam.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <div class="btn-group mx-auto" role="group" aria-label="Basic example">
                                <a type="button" href="{{route('viewscores')}}" class="btn btn-info ml-1 btn-sm" role="button"> <i class="ik ik-book"></i> Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Buat Soal</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/add.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        @include('layouts.modal.addsoal')
                        <div class="d-flex align-items-center flex-row mt-30">
                            <button type="button" data-toggle="modal" data-target="#addsoal" class="btn mx-auto btn-outline-primary"><i class="ik ik-plus"></i> Buat Soal</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Semua Soal</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" role="button" href="{{route('viewallquestions')}}" class="btn mx-auto btn-outline-info">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif