<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->role == "admin")
            <img src="{{url('dashboardasset/img/panduan.JPG')}}"/>
            @elseif(Auth::user()->role == "student")
            <img src="{{url('dashboardasset/img/panduan2.JPG')}}"/>
            
            @endif
        </div>
    </div>
</div>