<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item active">
                <a href="{{route('index')}}"><i class="ik ik-home"></i><span>Dashboard</span></a>
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="{{route('showcode')}}"><i class="ik ik-code"></i><span>Praktik</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-book-open"></i><span>Dokumentasi</span></a>
                @endif
            </div>

            <div class="nav-lavel">Soal/Quiz</div>
            <div class="nav-item">
                <a href="{{route('viewallquestions')}}"><i class="ik ik-book"></i><span>Lihat Soal</span></a>
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="#" data-toggle="modal" data-target="#getsoal"><i class="ik ik-plus"></i><span>Kode Soal</span></a>
                @else
                <a href="#" data-toggle="modal" data-target="#addsoal"><i class="ik ik-plus"></i><span>Buat Soal</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="{{route('viewscores')}}"><i class="ik ik-check-square"></i><span>Nilai</span></a>
                @endif
            </div>



            <div class="nav-lavel">Akun</div>
            <div class="nav-item">
                <a href="{{route('viewuser')}}"><i class="ik ik-unlock"></i><span>Ubah Sandi</span></a>
            </div>
            <div class="nav-item">
                <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-log-out"></i><span>Keluar</span></a>
            </div>
           

        </nav>
    </div>
</div>