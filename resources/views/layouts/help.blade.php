<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->role == "admin")
            <img src="{{url('dashboardasset/img/panduan.JPG')}}" />
            <ol>
                
            </ol>
            @elseif(Auth::user()->role == "student")

            <ol>
                <li>Siswa diharuskan mengunduh dan membaca materi terlebih dahulu.</li>
                <li>Setelah membaca materi, siswa dipersilahkan untuk belajar koding di menu latihan koding.</li>
                <li>Siswa mengerjakan kuis/tugas di setiap minggunya.</li>
                <li>Siswa dapat melihat hasil nilai di setiap minggunya di dalam menu evaluasi nilai.</li>
                <li>Siswa diharuskan menaati dan memahami peraturan yang ada.</li>
            </ol>
            @endif
        </div>
    </div>
</div>