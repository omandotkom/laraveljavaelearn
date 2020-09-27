<div class="main-content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card w-75">
                <div class="card-header d-block">
                    <h3>Daftar Kelas</h3>
                </div>
                <div class="card-body p-0 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-inverse">
                            <thead>
                                
                                <tr>
                                    <th>Kelas</th>
                                    <th>Instruktur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                <tr>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->user->name}}</td>
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