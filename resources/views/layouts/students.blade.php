<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card w-75">
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
                                     </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->student->name}}</td>
                                    <td>{{$student->created_at}}</td>
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