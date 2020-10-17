@if(Auth::user()->role == "admin")
@include('layouts.modal.addmaterials')
@endif
<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-block">
                    <h3>Seluruh Materi Kelas</h3>

                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-inverse">
                            <thead>

                                <tr>
                                    <th>Kelas</th>
                                    <th>Judul Materi</th>
                                    <th>Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $m)
                                <tr>
                                <td>{{$m->kelas->name}}</td>
                                <td>{{$m->name}}</td>
                                <td><a href="{{asset('storage/'.$m->document)}}" target="_blank" class="badge badge-primary">Unduh</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @if(Auth::user()->role != "student")
                    <button type="button" data-toggle="modal" data-target="#addmaterials" class="btn btn-outline-primary float-right">Tambah Materi</button>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>