<header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between float-left">
                     
                        <div class="top-menu d-flex align-items-center">
                            
                       <h3>@if(isset($title)) {{$title}} @else PAGE_NAME @endif</h3>

                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between float-right">
                     
                        <div class="top-menu d-flex align-items-center">
                            
                        {{Auth::user()->name}}
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{url('dashboardasset/img/user.jpg')}}" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>