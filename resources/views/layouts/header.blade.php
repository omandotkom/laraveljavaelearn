<header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between float-left">
                     
                        <div class="top-menu d-flex align-items-center">
                            
                       <h3>@if(isset($title)) {{$title}} @else Dashboard @endif</h3>

                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between float-right">
                     
                        <div class="top-menu d-flex align-items-center">
                            
                        {{Auth::user()->name}}
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{url('dashboardasset/img/user.jpg')}}" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{route('viewuser')}}"><i class="ik ik-user dropdown-icon"></i> Akun</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="ik ik-power dropdown-icon"></i> {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>