<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header d-block">
                    <h3>Daftar Siswa</h3>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bergabung Pada</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Ubah Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>{{$student->answers}} / {{$totalquiz}}</td>
                                    <td>{{$student->status}}</td>
                                    <td>
                                        <div class="btn-group" role="group">

                                            <a href="{{route('changestatus',['id'=>$student->id,'status'=>'active'])}}" type="button" role="button" class="btn btn-success btn-sm">Aktif</a>
                                            <a href="{{route('changestatus',['id'=>$student->id,'status'=>'pending'])}}" type="button" role="button" class="btn btn-danger btn-sm text-white">Berhenti</a>
                                            <a href="{{route('changestatus',['id'=>$student->id,'status'=>'graduate'])}}" type="button" role="button" class="btn btn-info btn-sm">Lulus</a>   
                                        </div>


                                    </td>
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