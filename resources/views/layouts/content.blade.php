@if(Auth::user()->role == "student")
@include('layouts.modal.getsoal')

<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        @php
        $num = 1;
        @endphp
    @include('layouts.dashboards.materi')
    @php
        $num = $num+1;
    @endphp
    @include('layouts.dashboards.coding')
    @php
        $num = $num+1;
    @endphp
    @include('layouts.dashboards.soal')
    @php
        $num = $num+1;
    @endphp
    @include('layouts.dashboards.nilai')
    @php
        $num = $num+1;
    @endphp
    @include('layouts.dashboards.kelas')
    
    @php
        $num = $num+1;
    @endphp
    @include('layouts.dashboards.instruktur')
    @php
        $num = $num+1;
    @endphp        
    @include('layouts.dashboards.bantuan')
        </div>
    </div>
</div>
@elseif (Auth::user()->role == "admin")
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.dashboards.materi')
        @include('layouts.dashboards.buatsoal')
        @include('layouts.dashboards.soal')
        @include('layouts.dashboards.siswa')
        @include('layouts.dashboards.kelas')
        @include('layouts.dashboards.bantuan')
    
                
            
            
            
            
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