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
                                    <th>Upload</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $m)
                                <tr>
                                    <td>{{$m->kelas->name}}</td>
                                    <td>{{$m->name}}</td>
                                    <td>
                                        <div class="btn-group-vertical">
                                            <a href="{{asset('storage/'.$m->document)}}" target="_blank" class="badge badge-primary m-1">Unduh</a>
                                            @if(Auth::user()->role == "admin")
                                            <a href="{{route('deletematerial',$m->id)}}" target="_blank" class="badge badge-danger m-1">Hapus</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$m->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @if(Auth::user()->role == "admin")
                    <button type="button" data-toggle="modal" data-target="#addmaterials" class="btn btn-outline-primary float-right">Tambah Materi</button>
                    @elseif (Auth::user()->role =="student")
                    <small>*Setelah anda membaca materi, silahkan langsung ke menu latihan koding</small>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>