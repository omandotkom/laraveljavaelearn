<div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Materi</h4>
                        </div>
                        <div class="d-flex align-items-center flex-row mt-30">
                            <img src="{{url('dashboardasset/img/materials.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
                        </div>
                        @include('layouts.modal.addsoal')
                        <div class="d-flex align-items-center flex-row mt-30">
                            <a href="{{route('indexmaterial')}}" type="button" role="button" class="btn mx-auto btn-outline-info"><i class="ik ik-plus"></i> Lihat Materi</a>
                        </div>
                    </div>
                </div>
            </div>
            