<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">Navigation</div>
            <div class="nav-item active">
                <a href="{{route('index')}}"><i class="ik ik-home"></i><span>Dashboard</span></a>
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="{{route('index',['mode'=>'practice'])}}"><i class="ik ik-code"></i><span>Praktik</span></a>
                @endif
            </div>

            @if (Auth::user()->role != "superadmin")
             
            <div class="nav-lavel">Soal/Quiz</div>
            <div class="nav-item">
                <a href="{{route('index',['mode'=>'view'])}}"><i class="ik ik-book"></i><span>Lihat Soal</span></a>
            </div>
            @endif
            <div class="nav-item">
                <!--
                //MAKING IT AS A COMMENT SINCE 04 JUN 2020    
                @if(Auth::user()->role =="student")
                <a href="#" data-toggle="modal" data-target="#getsoal"><i class="ik ik-plus"></i><span>Kode Soal</span></a>
                @else
                <a href="#" data-toggle="modal" data-target="#addsoal"><i class="ik ik-plus"></i><span>Buat Soal</span></a>
                @endif-->
                @if(Auth::user()->role =="student")
                <a href="#" data-toggle="modal" data-target="#getsoal"><i class="ik ik-plus"></i><span>Kode Soal</span></a>
                @elseif(Auth::user()->role == "admin")
                <a href="{{route('index',['mode'=>'create'])}}"><i class="ik ik-plus"></i><span>Buat Soal</span></a>
                @endif
            </div>
            <div class="nav-item">
                @if(Auth::user()->role =="student")
                <a href="{{route('index',['mode'=>'score'])}}"><i class="ik ik-check-square"></i><span>Nilai</span></a>
                @endif
            </div>
            @if(Auth::user()->role == "admin")
            <div class="nav-lavel">Laporan Pengerjaan</div>
            <div id="laporansidebar"></div>
            <script>
                $(document).ready(function() {
                    console.log("requestiong...");

                    // Make a request for a user with a given ID
                    var questionURL = "{{route('getdosenquestions')}}".concat("/").concat("{{Auth::user()->id}}");
                    console.log(questionURL);
                    axios.get(questionURL)
                        .then(function(response) {
                            // handle success
                            response.data.forEach(myFunction);
                        })
                        .catch(function(error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function() {
                            // always executed
                        });
                });

                function myFunction(item, index) {
                    console.log("aftering..." + item.id);
                    var nameArr = item.name.split(" ");
                    var name;
                    if (nameArr.length > 1) {
                        name = nameArr[0].concat(" ...");
                    } else {
                        name = nameArr[0];
                    }


                    var r = "<div class='nav-item' data-toggle='tooltip' data-placement='right' title='".concat(item.name).concat("'>")
                        .concat("<a href=").concat("'{{route('viewanswerer')}}")
                        .concat("/")
                        .concat(item.id)
                        .concat("'><i class='ik ik-file'></i><span>")
                        .concat(name)
                        .concat("</span>").concat("<i class='float-right ik ik-external-link'></i>").concat("</a>")
                        .concat("</div>");
                    $("#laporansidebar").append(r);
                }
            </script>
            @endif

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