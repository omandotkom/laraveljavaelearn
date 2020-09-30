@if(Auth::user()->role == "student")
@include('layouts.modal.getsoal')

<div class="main-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Latihan Koding</h4>
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
                                {{--<a type="button" data-toggle="modal" data-target="#getsoal" class="btn btn-info mr-1 btn-sm text-white" role="button"> <i class="ik ik-plus"></i> Kode Soal</a> --}}
                                <a type="button" href="{{route('viewallquestions')}}" class="btn btn-info ml-1 btn-sm" role="button"> <i class="ik ik-book"></i> Lihat Soal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Evaluasi Nilai</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/exam.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <div class="btn-group mx-auto" role="group" aria-label="Basic example">
                                <a type="button" href="{{route('viewscores')}}" class="btn btn-info ml-1 btn-sm" role="button"><i class="ik ik-book"></i> Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Manajemen Kelas</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            @if (isset($userclass) && $userclass != null)
                            <a type="button" role="button" href="{{route('ruleindex',$userclass->class_id)}}" class="btn mx-auto btn-outline-info"></i>Lihat Kelas</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Materi</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/add.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        @include('layouts.modal.addsoal')
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a href="{{route('indexmaterial')}}" type="button" role="button" class="btn mx-auto btn-outline-primary"><i class="ik ik-plus"></i> Lihat / Tambah Materi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (Auth::user()->role == "admin")
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
                            <a type="button" role="button" href="{{route('viewallquestions')}}" class="btn mx-auto btn-outline-info"><i class="ik ik-book"></i>Lihat Soal</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Materi</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/add.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        @include('layouts.modal.addsoal')
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a href="{{route('indexmaterial')}}" type="button" role="button" class="btn mx-auto btn-outline-primary"><i class="ik ik-plus"></i> Lihat / Tambah Materi</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Siswa</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/add.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a href="{{route('userclassindex')}}"  class="btn mx-auto btn-outline-primary"><i class="ik ik-plus"></i> Lihat Seluruh Siswa</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Manajemen Kelas</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" role="button" href="{{route('indexclass')}}" class="btn mx-auto btn-outline-info"></i>Lihat Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Auth::user()->role == "superadmin")
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.modal.addakun')
        @include('layouts.modal.addclass')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Akun Instruktur</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" data-toggle="modal" data-target="#addakun" role="button" href="#" class="btn mx-auto btn-outline-info"></i>Buat Akun</a>
                            <a type="button" role="button" href="{{route('showinstructor')}}" class="btn mx-auto btn-outline-info"></i>Lihat Akun</a>
                       
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Manajemen Kelas</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/list.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" data-toggle="modal" data-target="#addclass" role="button" href="#" class="btn mx-auto btn-outline-info"></i>Tambah Kelas</a>
                            <a type="button" role="button" href="{{route('indexclass')}}" class="btn mx-auto btn-outline-info"></i>Lihat Kelas</a>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif