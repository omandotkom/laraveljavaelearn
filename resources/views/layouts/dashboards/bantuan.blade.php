<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="card-title">@if(isset($num)) <b style="font-size:25px;">@php echo $num; @endphp</b> @endif Bantuan</h4>
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                <img src="{{url('dashboardasset/img/help.png')}}" class="rounded img-fluid mx-auto d-block" alt="...">
            </div>
            <div class="d-flex align-items-center flex-row mt-30">
                <a type="button" role="button" href="{{route('help')}}" class="btn mx-auto btn-outline-info"></i>Bantuan</a>
            </div>
        </div>
    </div>
</div>