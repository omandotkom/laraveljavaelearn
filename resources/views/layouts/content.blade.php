@if(Auth::user()->role == "student")
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
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
                            </div>

                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a type="button" href="{{route('showcode')}}" class="btn mx-auto btn-info btn-sm" role="button"> <i class="ik ik-terminal"></i> Code</a>
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
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
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
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
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
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
                            </div>

                        </div>
                        @include('layouts.modal.addsoal')
                        <div class="d-flex align-items-center flex-row mt-30">
                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-icon btn-outline-primary"><i class="ik ik-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Daftar Soal</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
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
                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                            <div class="p-2">
                                <h3 class="mb-0">Saturday</h3><small>Banglore, India</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif