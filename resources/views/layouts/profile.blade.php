<div class="main-content">

    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>

        @endif
        @if ($message = Session::get('error'))
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>

        @endif
        @if(!isset($viewmode))
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="pills-setting-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="pills-setting" aria-selected="true"><i class="ik ik-user"></i> Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#changepassword" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="ik ik-lock"></i> Sandi</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="{{route('updateprofile')}}">
                            @csrf
                            <div class="form-group">
                                <label for="example-name">Nama Lengkap</label>
                                <input required type="text" placeholder="Johnathan Doe" value="{{Auth::user()->name}}" class="form-control" name="name" id="example-name">
                            </div>
                            <div class="form-group">
                                <label for="example-email">Email</label>
                                <input required type="email" placeholder="johnathan@admin.com" value="{{Auth::user()->email}}" class="form-control" name="email" id="example-email">
                            </div>
                            @if(Auth::user()->role == "admin")
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input required type="text" placeholder="08139812...." value="{{Auth::user()->phone}}" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="address" rows="4">{{Auth::user()->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Kota</label>
                                <input required type="text" placeholder="Bekasi" value="{{Auth::user()->city}}" class="form-control" name="city">
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Tnnggal Lahir</label>
                                <input required type="date" value="{{Auth::user()->birthdate}}" class="form-control" name="birthdate">
                            </div>
                            @endif
                            <button class="btn btn-success float-right m-3" type="submit"><i class="ik ik-user-check"></i>Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="changepassword" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="{{route('changepassword')}}">
                            @csrf
                            <div class="form-group">
                                <label for="newpass">Password Baru</label>
                                <input type="password" class="form-control" name="password" id="newpass">
                            </div>
                            <div class="form-group">
                                <label for="confirnewpass">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirnewpass">
                            </div>
                            <button class="btn btn-success float-right m-3" type="submit"><i class="ik ik-lock"></i> Ubah Sandi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <dl>
                            <dt>Kelas</dt>
                            <dd>{{$class->name}}</dd>
                            <dt>Nama Instruktur</dt>
                            <dd>{{$user->name}}</dd>
                            <dt>Email</dt>
                            <dd>{{$user->email}}</dd>
                            <dt>Telepon</dt>
                            <dd>{{$user->phone}}</dd>
                            <dt>Alamat</dt>
                            <dd>{{$user->address}}</dd>
                            <dt>Tempat Tanggal Lahir</dt>
                            <dd>{{$user->city}}, {{$user->birthdate}}</dd>
                        </dl>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>