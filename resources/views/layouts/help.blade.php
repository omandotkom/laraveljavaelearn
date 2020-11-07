<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->role == "admin")
            <img src="{{url('dashboardasset/img/panduan.JPG')}}" />
            <ol>
                
            </ol>
            @elseif(Auth::user()->role == "student")
            <ol>
                <li>Siswa login terlebih dahulu menggunakan e-mail dan password yang telah terdaftar.</li>
                <li>Siswa mengakses menu materi untuk melihat dan mengunduh materi.</li>
                <li>Siswa mengakses menu latihan koding untuk latihan terlebih dahulu sebelum mengisi quiz</li>
                <li>Siswa mengakses menu soal untuk mengerjakan quiz yang tersedia</li>
                <li>Siswa mengakses menu evaluasi nilai untuk melihat hasil nilai yang didapat</li>
                <li>Siswa mengakses menu manajemen kelas untuk melihat tata tertib kelas yang sudah ditentukan oleh Instruktur.</li>
            </ol>
            @endif
        </div>
    </div>
</div>