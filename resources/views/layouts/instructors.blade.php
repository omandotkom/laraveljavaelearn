<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card w-50">
                <div class="card-header d-block">
                    <h3>Daftar Instruktur</h3>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-inverse">
                            <thead>

                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Informasi</th>
                                    <th>Aksi</th>
                                    <th>Terakhir Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        
                                    <div class="btn-group-vertical">
                                            <a class="btn btn-outline-info m-1" href="{{route('userclassindex',$user->id)}}" role="button">Siswa</a>

                                            <a class="btn btn-outline-info m-1" href="{{route('indexmaterial',$user->id)}}" role="button">Materi</a>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical">
                                            <a class="btn btn-outline-info m-1" href="{{route('viewuser',$user->id)}}" role="button">Edit</a>

                                            <a class="btn btn-outline-danger m-1" href="#" role="button">Hapus</a>

                                        </div>
                                    </td>
                                    <td>{{$user->last_activity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>