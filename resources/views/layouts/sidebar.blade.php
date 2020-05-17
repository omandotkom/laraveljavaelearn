<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item active">
                <a href="index.html"><i class="ik ik-home"></i><span>Dashboard</span></a>
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-code"></i><span>Praktik</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-book-open"></i><span>Dokumentasi</span></a>
                @endif
            </div>

            <div class="nav-lavel">Soal/Quiz</div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-book"></i><span>Lihat Soal</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-plus"></i><span>Kode Soal</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="pages/navbar.html"><i class="ik ik-check-square"></i><span>Nilai</span></a>
                @endif
            </div>

           

            <div class="nav-lavel">Akun</div>
            <div class="nav-item">
                <a href="pages/table-bootstrap.html"><i class="ik ik-unlock"></i><span>Ubah Sandi</span></a>
            </div>
            <div class="nav-item">
                <a href="pages/table-bootstrap.html"><i class="ik ik-log-out"></i><span>Keluar</span></a>
            </div>
             <div class="nav-lavel">Sistem</div>
            <div class="nav-item">
                <a href="pages/form-picker.html"><i class="ik ik-help-circle"></i><span>Bantuan</span> </a>
            </div>
            <div class="nav-item">
                <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>
            </div>
          
        </nav>
    </div>
</div>