
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